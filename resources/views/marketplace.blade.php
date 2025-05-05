@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Marketplace
@endsection

@section('content')
        <div class="row">
            <div class="col-12 col-lg-8">
                <h5 class="silver">
                    Top Movers
                    <small class="float-right">During the past 7 days</small>
                </h5>
                <div class="row no-gutters">
                   @foreach($topMovers as $offer)
    <div class="col-6 col-lg-4 p-1">
        <div class="offer offer-neutral d-flex h-100 px-4 py-3 position-relative">
            <!-- Badge displaying the count of sales with tooltip -->
            <span 
                class="position-absolute badge badge-pill badge-info text-white" 
                data-toggle="tooltip" 
                data-placement="top" 
                title="Sold {{ $offer->count }} times in the past 7 days">
                {{ $offer->count }}
            </span>

            <!-- Item details -->
            <div class="d-flex align-items-center">
                <div class="d-flex justify-content-center mr-3 icon">
                    <!-- Display the item icon with optional fallback -->
                    <img 
                        src="{{ config('app.app_assets') }}/dcr/hof_furni/icons/{{ optional(optional($offer->item)->baseItem)->item_name ?? 'unknown' }}_icon.png" 
                        alt="{{ optional(optional($offer->item)->baseItem)->public_name ?? 'Unknown Item' }}" 
                        loading="lazy"
                    >
                </div>

                <div>
                    <span 
                        class="d-block font-weight-bold truncate-text" 
                        data-toggle="tooltip" 
                        data-placement="top" 
                        title="{{ optional(optional($offer->item)->baseItem)->public_name ?? 'Unknown Item' }}">
                        {{ optional(optional($offer->item)->baseItem)->public_name ?? 'Unknown Item' }}
                    </span>
                    <!-- Display the average price of the item -->
                    <span class="d-block">Avg. {{ $offer->item->baseItem->avgprice ?? 0 }}c</span>
                </div>
            </div>
        </div>
    </div>
@endforeach

                </div>

                <h5 class="silver mt-3">
                    Active Offers
                    <small class="float-right">Grouped by most available</small>
                </h5>
                <div class="row no-gutters">
                 @foreach($activeOffers as $offer)
        @php
            // Determine badge color and tooltip
            $badgeColor = $offer->priceDifference > 0 ? 'danger' : 'success'; // Red for higher, green for lower
            $tooltip = $offer->priceDifference > 0 
                ? "This item is priced {$offer->priceDifference}% higher than usual." 
                : "This item is priced " . abs($offer->priceDifference) . "% lower than usual.";
        @endphp

        <div class="col-6 col-lg-4 p-1">
            <div class="offer offer-fair d-flex h-100 px-4 py-3 position-relative">
                <span 
                    class="position-absolute badge badge-pill badge-{{ $badgeColor }} text-white" 
                    data-toggle="tooltip" 
                    data-placement="top" 
                    title="{{ $tooltip }}">
                    {{ abs($offer->priceDifference) }}%
                </span>

                <div class="d-flex align-items-center">
                    <div class="mr-3 icon">
                        <img 
                            src="{{ config('app.app_assets') }}/dcr/hof_furni/icons/{{ optional($offer->item->baseItem)->item_name ?? 'unknown' }}_icon.png" 
                            alt="{{ optional($offer->item->baseItem)->public_name ?? 'Unknown Item' }}" 
                            loading="lazy">
                    </div>

                    <div>
                        <span 
                            class="d-block font-weight-bold truncate-text" 
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="{{ optional($offer->item->baseItem)->public_name ?? 'Unknown Item' }}">
                            {{ optional($offer->item->baseItem)->public_name ?? 'Unknown Item' }}
                        </span>
                        <span class="d-block">from {{ $offer->price }}c</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
                </div>

                <h5 class="silver mt-3">Recently Listed</h5>
                <div class="row no-gutters">
                  @foreach($recentlyListedItems as $offer)
        @php
            // Determine badge color and tooltip
            $badgeColor = $offer->priceDifference > 0 ? 'danger' : 'success'; // Red for higher, green for lower
            $tooltip = $offer->priceDifference > 0 
                ? "This item is priced {$offer->priceDifference}% higher than usual." 
                : "This item is priced " . abs($offer->priceDifference) . "% lower than usual.";
        @endphp

        <div class="col-6 col-lg-4 p-1">
            <div class="offer offer-fair d-flex h-100 px-4 py-3 position-relative">
                <span 
                    class="position-absolute badge badge-pill badge-{{ $badgeColor }} text-white"
                    data-toggle="tooltip" 
                    data-placement="top" 
                    title="{{ $tooltip }}">
                    {{ abs($offer->priceDifference) }}%
                </span>

                <div class="d-flex align-items-center">
                    <div class="mr-3 icon">
                        <img 
                            src="{{ config('app.app_assets') }}/dcr/hof_furni/icons/{{ optional($offer->item->baseItem)->item_name ?? 'unknown' }}_icon.png" 
                            alt="{{ optional($offer->item->baseItem)->public_name ?? 'Unknown Item' }}" 
                            loading="lazy">
                    </div>

                    <div>
                        <span 
                            class="d-block font-weight-bold truncate-text" 
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="{{ optional($offer->item->baseItem)->public_name ?? 'Unknown Item' }}">
                            {{ optional($offer->item->baseItem)->public_name ?? 'Unknown Item' }}
                        </span>
                        <span class="d-block">from {{ $offer->price }}c</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
                </div>
            </div>

            <div class="col-12 col-lg-4 mt-3 mt-lg-0">
                <h5 class="silver">Recently Sold</h5>
                <div class="card">
                    <div class="card-body">
                         @foreach($recentlySoldItems as $offer)
            <div class="offer d-flex align-items-start justify-content-between {{ !$loop->first ? 'border-top pt-3 mt-3' : '' }}">
                <div class="d-flex align-items-center mr-4">
                    <div class="d-flex justify-content-center mr-3 icon">
                        <img 
                            src="{{ config('app.app_assets') }}/dcr/hof_furni/icons/{{ optional($offer->item->baseItem)->item_name ?? 'unknown' }}_icon.png" 
                            alt="{{ optional($offer->item->baseItem)->public_name ?? 'Unknown Item' }}" 
                            loading="lazy">
                    </div>

                    <div>
                        <span 
                            class="d-block font-weight-bold truncate-text" 
                            style="width: 180px;" 
                            data-toggle="tooltip" 
                            data-placement="top" 
                            title="{{ optional($offer->item->baseItem)->public_name ?? 'Unknown Item' }}">
                            {{ optional($offer->item->baseItem)->public_name ?? 'Unknown Item' }}
                        </span>
                        <span class="d-block">{{ number_format($offer->price) }}c</span>
                    </div>
                </div>

                <div>
                    <span class="text-muted">{{ $offer->soldTimeAgo }}</span>
                </div>
            </div>
        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection
