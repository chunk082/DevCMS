<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class SyncHabboonBadges extends Command
{
    protected $signature = 'habboon:sync-badges {--format=gif}';
    protected $description = 'Sync badges from Habboon ExternalTexts and album1584, and optionally convert to PNG.';

    public function handle()
    {
        $format = strtolower($this->option('format'));
        if (!in_array($format, ['gif', 'png'])) {
            $this->error("❌ Invalid format. Use --format=gif or --format=png");
            return;
        }

        $this->info("🔄 Fetching badge metadata from Habboon...");
        $response = Http::get('https://assets.habboon.pw/nitro/gamedata/ExternalTexts.json');

        if ($response->failed()) {
            $this->error('❌ Failed to fetch ExternalTexts.json');
            return;
        }

        $texts = $response->json();

        $badges = collect($texts)
            ->filter(fn($v, $k) => str_starts_with($k, 'badge_name_'))
            ->mapWithKeys(function ($name, $key) use ($texts) {
                $code = str_replace('badge_name_', '', $key);
                return [
                    $code => [
                        'name' => $name,
                        'description' => $texts["badge_desc_$code"] ?? null,
                        'image_url' => "https://assets.habboon.pw/c_images/album1584/{$code}.gif"
                    ]
                ];
            });

        $savePath = '/var/www/assets/swf/c_images/album1584/';
        if (!file_exists($savePath)) mkdir($savePath, 0755, true);

        $this->info("📥 Downloading badge images as .$format...");

        foreach ($badges as $code => $badge) {
            $localPath = $savePath . $code . '.' . $format;

            // Skip if file already exists
            if (file_exists($localPath)) {
                $this->line("⏩ Skipped (already exists): $code");
                continue;
            }

            try {
                $imageResponse = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                ])->get($badge['image_url']);

                if ($imageResponse->successful()) {
                    $gifData = $imageResponse->body();

                    if ($format === 'png') {
                        $tmpFile = tmpfile();
                        $tmpPath = stream_get_meta_data($tmpFile)['uri'];
                        file_put_contents($tmpPath, $gifData);

                        $gifImage = @imagecreatefromgif($tmpPath);
                        if (!$gifImage) {
                            $this->warn("⚠️ Failed to convert $code to PNG");
                            fclose($tmpFile);
                            continue;
                        }

                        imagepng($gifImage, $localPath);
                        imagedestroy($gifImage);
                        fclose($tmpFile);
                        $this->info("✅ Converted & saved as PNG: $code");
                    } else {
                        file_put_contents($localPath, $gifData);
                        $this->info("✅ Downloaded GIF: $code");
                    }

                } else {
                    $this->warn("❌ Failed to fetch image: $code — " . $imageResponse->status());
                }
            } catch (\Exception $e) {
                $this->warn("⚠️ Failed: $code — " . $e->getMessage());
                continue;
            }

            // Insert or update DB
            try {
                DB::table('badge_definitions')->updateOrInsert(
                    ['code' => $code],
                    [
                        'name' => $badge['name'],
                        'description' => $badge['description'],
                    ]
                );
            } catch (\Exception $e) {
                $this->warn("⚠️ DB insert failed: $code — " . $e->getMessage());
            }
        }

        $this->info("🎉 Badge sync from Habboon complete!");
    }
}
