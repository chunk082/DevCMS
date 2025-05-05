<?php

namespace App\Http\Controllers\Marketplace;

use App\Models\Marketplace\MarketplaceItem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

class MarketplaceController extends Controller
{
    public function showMarketplace()
    {
        // Fetch all active offers with their linked base items
        $activeOffers = MarketplaceItem::where('state', 1)
            ->with('item.baseItem') // Load nested relationships
            ->orderBy('price', 'asc')
            ->take(9)
            ->get()
            ->map(function ($offer) {
                $avgPrice = optional($offer->item->baseItem)->avgprice ?? 0;
                $currentPrice = $offer->price;

                if ($avgPrice > 0) {
                    // Calculate percentage difference
                    $offer->priceDifference = round((($currentPrice - $avgPrice) / $avgPrice) * 100);
                     } else {
                    $offer->priceDifference = 0; // Fallback for missing avgprice
                    }

                    return $offer;
                    });

        // Fetch recently listed items with their linked base items
        $recentlyListedItems = MarketplaceItem::where('state', 1)
                ->with('item.baseItem') // Load nested relationships
                ->orderBy('timestamp', 'desc')
                ->take(9)
                ->get()
                ->map(function ($offer) {
                    $avgPrice = optional($offer->item->baseItem)->avgprice ?? 0;
                     $currentPrice = $offer->price;

                     if ($avgPrice > 0) {
                    // Calculate percentage difference
                        $offer->priceDifference = round((($currentPrice - $avgPrice) / $avgPrice) * 100);
                            } else {
                        $offer->priceDifference = 0; // Fallback for missing avgprice
                        }

                        return $offer;
                    });

        // Fetch recently sold items with their linked base items
        $recentlySoldItems = MarketplaceItem::where('state', 2)
                ->with('item.baseItem') // Load nested relationships
                ->orderBy('sold_timestamp', 'desc')
                ->take(11)
                ->get()
                ->map(function ($offer) {
                        $offer->soldTimeAgo = $offer->sold_timestamp 
                            ? Carbon::createFromTimestamp($offer->sold_timestamp)
                         ->diffForHumans(['short' => true, 'parts' => 1]) // Use short format
                        : null;
                return $offer;
            });

        // Fetch top movers (most sold items) with their linked base items
        $topMovers = MarketplaceItem::select('item_id', DB::raw('COUNT(*) as count'))
            ->where('state', 2)
            ->groupBy('item_id')
            ->orderBy('count', 'desc')
            ->with('item.baseItem') // Load nested relationships
            ->take(6)
            ->get();

        // Pass all data to the view
        return view('marketplace', compact('activeOffers', 'recentlyListedItems', 'recentlySoldItems', 'topMovers'));
    }
}
