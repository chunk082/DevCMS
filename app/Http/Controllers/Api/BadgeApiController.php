<?php 

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class BadgeApiController extends Controller
{
    public function fetchHabboon(): JsonResponse
    {
        $cacheKey = 'api.habboon.badges';

        $badges = Cache::remember($cacheKey, now()->addHours(6), function () {
            $response = Http::timeout(10)->get('https://assets.habboon.pw/nitro/gamedata/ExternalTexts.json');

            if ($response->failed()) {
                return [];
            }

            $texts = $response->json();

            return collect($texts)
                ->filter(fn($v, $k) => str_starts_with($k, 'badge_name_'))
                ->mapWithKeys(function ($name, $key) use ($texts) {
                    $code = str_replace('badge_name_', '', $key);

                    return [
                        $code => [
                            'code'        => $code,
                            'name'        => $name,
                            'description' => $texts["badge_desc_$code"] ?? null,
                            'image'       => "https://assets.habboon.pw/c_images/album1584/{$code}.gif",
                        ]
                    ];
                })->sortKeys();
        });

        return response()->json($badges);
    }
}
