<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SyncHabboBadges extends Command
{
    protected $signature = 'habbo:sync-badges {--hotel=com} {--limit=100} {--offset=0}';
    protected $description = 'Sync badges from HabboAssets API and store them in badge_definitions + save images';

    public function handle()
    {
        $hotel = $this->option('hotel');
        $limit = $this->option('limit');
        $offset = $this->option('offset');

        $apiUrl = "https://www.habboassets.com/api/v1/badges?hotel=$hotel&limit=$limit&offset=$offset";
        $this->info("Fetching badge data from: $apiUrl");

        $response = Http::get($apiUrl);

        if (!$response->successful()) {
            $this->error("❌ Failed to fetch badge data from API.");
            return;
        }

        $badges = $response->json()['badges'] ?? [];

        $imagePath = '/var/www/assets/swf/c_images/album1584';
        if (!file_exists($imagePath)) mkdir($imagePath, 0755, true);

        foreach ($badges as $badge) {
            $code = $badge['code'] ?? null;
            $name = $badge['name'] ?? null;
            $desc = $badge['description'] ?? '';

            if (!$code) continue;

            // Check if badge already exists in DB
            $exists = DB::table('badge_definitions')->where('code', $code)->exists();

            if (!$exists) {
                // Save image if it doesn't exist
                $localImage = "$imagePath/{$code}.gif";
                if (!file_exists($localImage)) {
                    $remoteImage = "https://images.habbo.com/c_images/album1584/{$code}.gif";
                    try {
                        file_put_contents($localImage, file_get_contents($remoteImage));
                        $this->info("🖼️ Downloaded image for: $code");
                    } catch (\Exception $e) {
                        $this->warn("⚠️ Failed to download image for: $code");
                        continue;
                    }
                }

                // Insert or update DB
            DB::table('badge_definitions')->updateOrInsert(
                ['code' => $code],
                [
                    'name' => $name,
                    'description' => $desc,
                ]
            );

                $this->info("✅ Inserted badge: $code");
            } else {
                $this->line("⏭️ Skipped existing badge: $code");
            }
        }

        $this->info("🎉 Badge sync complete!");
    }
}
