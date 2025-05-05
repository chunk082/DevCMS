<?php

namespace App\Http\Controllers\Community;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Get all active banners for the public-facing site.
     */
    public function getActiveBanners()
    {
        return Banner::where('active', true)->get();
    }
}
