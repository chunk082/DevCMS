@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Store
@endsection

@section('content')
        <script>
        window.giftVipStoreUrl = "https://devcms.online/store/gift-vip";
        </script>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="alert alert-warning" role="alert">
                    <strong>Heads up!</strong>
                     The store is still in development. At this time VIP is currently not available. Please check back later.
                </div>
                @if (session('success'))
    <div class="alert alert-success" style="background-color: #d4edda; border-color: #c3e6cb; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
        <strong>Success!</strong> {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" style="background-color: #f8d7da; border-color: #f5c6cb; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
        <strong>Error!</strong> {{ session('error') }}
    </div>
@endif

            </div>
            <div class="col-lg-8 col-md-8 col-12">
                <h5 class="silver">VIP Ranks</h5>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card" style="margin-bottom: 0.75rem;">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <img src="https://assets.habboon.pw/c_images/album1584//BVIP.gif" alt="Bronze VIP" loading="lazy">
                                    </div>
                                    <div class="col text-center">
                                        Bronze (
                                        <span class="price">$5</span>
                                        )
                                    </div>
                                    <div class="col-12 mt-3">
                                       <form action="{{ route('store.purchase') }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <input type="hidden" name="product" value="bronze_vip">
                                            <button type="submit" class="btn btn-success">Buy</button>
                                        </form>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#giftVIPModal" data-package="bronze_vip">
                                            <i class="fas fa-gift" data-toggle="tooltip" data-placement="top" title="Gift a friend"></i>
                                        </button>
                                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#bronzeVIPModal">
                                            <i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="View Perks"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card" style="margin-bottom: 0.75rem;">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <img src="https://assets.habboon.pw/c_images/album1584//SVIP.gif" alt="Silver VIP" loading="lazy">
                                    </div>
                                    <div class="col text-center">
                                        Silver (
                                        <span class="price">$7</span>
                                        )
                                    </div>
                                    <div class="col-12 mt-3">
                                         <form action="{{ route('store.purchase') }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <input type="hidden" name="product" value="silver_vip">
                                            <button type="submit" class="btn btn-success">Buy</button>
                                        </form>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#giftVIPModal" data-package="silver_vip">
                                            <i class="fas fa-gift" data-toggle="tooltip" data-placement="top" title="Gift a friend"></i>
                                        </button>
                                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#silverVIPModal">
                                            <i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="View Perks"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="card" style="margin-bottom: 0.75rem;">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <img src="https://assets.habboon.pw/c_images/album1584//GVIP.gif" alt="Gold VIP" loading="lazy">
                                    </div>
                                    <div class="col text-center">
                                        Gold (
                                        <span class="price">$12</span>
                                        )
                                    </div>
                                    <div class="col-12 mt-3">
                                         <form action="{{ route('store.purchase') }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <input type="hidden" name="product" value="gold_vip">
                                            <button type="submit" class="btn btn-success">Buy</button>
                                        </form>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#giftVIPModal" data-package="gold_vip">
                                            <i class="fas fa-gift" data-toggle="tooltip" data-placement="top" title="Gift a friend"></i>
                                        </button>
                                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#goldVIPModal">
                                            <i class="fas fa-question" data-toggle="tooltip" data-placement="top" title="View Perks"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 d-none">
                        <div class="card" style="margin-bottom: 0.75rem;">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <img src="https://assets.habboon.pw/c_images/album1584//EVIP.gif" alt="Gold VIP" loading="lazy">
                                    </div>
                                    <div class="col text-center">
                                        Emerald (
                                        <span class="price">£??</span>
                                        )
                                    </div>
                                    <div class="col-12" style="margin-top: 10px;">
                                        <button class="btn btn-primary btn-block">Coming Soon</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 d-none">
                        <div class="card" style="margin-bottom: 0.75rem;">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="https://assets.habboon.pw/c_images/album1584//EVIP.gif" alt="Gold VIP" loading="lazy">
                                    </div>
                                    <div class="col text-center">
                                        Emerald Bonus (
                                        <span class="price">£??</span>
                                        )
                                    </div>
                                    <div class="col-12" style="margin-top: 10px;">
                                        <button class="btn btn-primary btn-block">Coming Soon</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="silver">
                    Currency 
                    <span class="float-right">
                        <i class="fas fa-coins"></i>
                    </span>
                </h5>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="https://www.habboon.pw/img/store/diamond-light.gif" alt="220 Diamonds" loading="lazy">
                                    </div>
                                    <div class="col text-right">
                                        220 Diamonds (
                                        <span class="price">$4</span>
                                        )
                                    </div>
                                    <div class="col-12" style="margin-top: 10px;">
                                        <form action="{{ route('store.purchase') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product" value="diamonds_220">
                                            <button type="submit" class="btn btn-success btn-block">Purchase</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="https://www.habboon.pw/img/store/diamond-blue.gif" alt="700 Diamonds" loading="lazy">
                                    </div>
                                    <div class="col text-right">
                                        700 Diamonds (
                                        <span class="price">$11</span>
                                        )
                                    </div>
                                    <div class="col-12" style="margin-top: 10px;">
                                        <form action="{{ route('store.purchase') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product" value="diamonds_700">
                                            <button type="submit" class="btn btn-success btn-block">Purchase</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="https://www.habboon.pw/img/store/diamond-gold.gif" alt="1200 Diamonds" loading="lazy">
                                    </div>
                                    <div class="col text-right">
                                        1200 Diamonds (
                                        <span class="price">$14</span>
                                        )
                                    </div>
                                    <div class="col-12" style="margin-top: 10px;">
                                        <form action="{{ route('store.purchase') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product" value="diamonds_1200">
                                            <button type="submit" class="btn btn-success btn-block">Purchase</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <h5 class="silver">
                    Add Credit 
                    <span class="float-right">
                        <i class="fas fa-piggy-bank"></i>
                    </span>
                </h5>
                <div class="card">
                <div class="card-body">
                    <div class="alert alert-warning rounded-3 shadow-sm" role="alert">
                        <div class="row align-items-center">
                            <div class="col-2 d-block d-lg-block d-md-none alert-icon-col">
                                <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 576 512"
        width="2.5em"
        height="2.5em"
        fill="currentColor"
        class=""
        >
    <path d="M400 96l0 .7c-5.3-.4-10.6-.7-16-.7L256 96c-16.5 0-32.5 2.1-47.8 6c-.1-2-.2-4-.2-6c0-53 43-96 96-96s96 43 96 96zm-16 32c3.5 0 7 .1 10.4 .3c4.2 .3 8.4 .7 12.6 1.3C424.6 109.1 450.8 96 480 96l11.5 0c10.4 0 18 9.8 15.5 19.9l-13.8 55.2c15.8 14.8 28.7 32.8 37.5 52.9l13.3 0c17.7 0 32 14.3 32 32l0 96c0 17.7-14.3 32-32 32l-32 0c-9.1 12.1-19.9 22.9-32 32l0 64c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-32-128 0 0 32c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-64c-34.9-26.2-58.7-66.3-63.2-112L68 304c-37.6 0-68-30.4-68-68s30.4-68 68-68l4 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-4 0c-11 0-20 9-20 20s9 20 20 20l31.2 0c12.1-59.8 57.7-107.5 116.3-122.8c12.9-3.4 26.5-5.2 40.5-5.2l128 0zm64 136a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"/>
</svg>                            </div>
                            <div class="col">
                                You have <strong>${{ number_format($wallet->balance, 2) }}</strong> account balance.
                            </div>
                        </div>
                    </div>

                    <p class="text-muted small">We advise that if you're not familiar with crypto or sending payments that you do not attempt to top-up.</p>

                                            <form action="{{ route('payment.store') }}" method="POST" id="topupForm">
                                                

                            <div class="mb-3">
                                <label for="amount" class="fw-bold form-label text-secondary">Amount</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary text-white">
                                                 <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 320 512"
        width="1em"
        height="1em"
        fill="currentColor"
        class=""
             >
    <path d="M160 0c17.7 0 32 14.3 32 32l0 35.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11l0 33.4c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-34.9c-.4-.1-.9-.1-1.3-.2l-.2 0s0 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7s0 0 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11L128 32c0-17.7 14.3-32 32-32z"/>
</svg>                                    </span>
                                    <input type="number" name="amount" class="form-control"
                                           placeholder="Enter amount"
                                           aria-label="Amount (to the nearest dollar)"
                                           min="1" max="500"
                                           required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="payment_gateway" class="fw-bold form-label text-secondary">Select Cryptocurrency</label>
                                <div class="crypto-selection">
                                    <div class="row g-2">
                                        <div class="col-4">
                                            <div class="crypto-option" data-value="SOL">
                                                <input type="radio" name="payment_gateway" id="SOL" value="SOL" class="d-none crypto-radio">
                                                <label for="SOL" class="crypto-label text-center p-2 rounded-3 border w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                                    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 397.7 311.7"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon mb-1"
                xml:space="preserve"
        style="enable-background:new 0 0 397.7 311.7">
    <linearGradient id="a" x1="360.879" x2="141.213" y1="351.455" y2="-69.294" gradientTransform="matrix(1 0 0 -1 0 314)" gradientUnits="userSpaceOnUse"><stop offset="0" style="stop-color:#00ffa3"/><stop offset="1" style="stop-color:#dc1fff"/></linearGradient><path d="M64.6 237.9c2.4-2.4 5.7-3.8 9.2-3.8h317.4c5.8 0 8.7 7 4.6 11.1l-62.7 62.7c-2.4 2.4-5.7 3.8-9.2 3.8H6.5c-5.8 0-8.7-7-4.6-11.1l62.7-62.7z" style="fill:url(#a)"/><linearGradient id="b" x1="264.829" x2="45.163" y1="401.601" y2="-19.148" gradientTransform="matrix(1 0 0 -1 0 314)" gradientUnits="userSpaceOnUse"><stop offset="0" style="stop-color:#00ffa3"/><stop offset="1" style="stop-color:#dc1fff"/></linearGradient><path d="M64.6 3.8C67.1 1.4 70.4 0 73.8 0h317.4c5.8 0 8.7 7 4.6 11.1l-62.7 62.7c-2.4 2.4-5.7 3.8-9.2 3.8H6.5c-5.8 0-8.7-7-4.6-11.1L64.6 3.8z" style="fill:url(#b)"/><linearGradient id="c" x1="312.548" x2="92.882" y1="376.688" y2="-44.061" gradientTransform="matrix(1 0 0 -1 0 314)" gradientUnits="userSpaceOnUse"><stop offset="0" style="stop-color:#00ffa3"/><stop offset="1" style="stop-color:#dc1fff"/></linearGradient><path d="M333.1 120.1c-2.4-2.4-5.7-3.8-9.2-3.8H6.5c-5.8 0-8.7 7-4.6 11.1l62.7 62.7c2.4 2.4 5.7 3.8 9.2 3.8h317.4c5.8 0 8.7-7 4.6-11.1l-62.7-62.7z" style="fill:url(#c)"/>
</svg>                                                    <span class="crypto-name small">Solana</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="crypto-option" data-value="ETH" data-has-tokens="true">
                                                <input type="radio" name="payment_gateway" id="ETH" value="ETH" class="d-none crypto-radio">
                                                <label for="ETH" class="crypto-label text-center p-2 rounded-3 border w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                                    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 784.37 1277.39"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon mb-1"
                xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" image-rendering="optimizeQuality"
        shape-rendering="geometricPrecision" text-rendering="geometricPrecision" ><g fill-rule="nonzero"><path fill="#343434" d="m392.07 0-8.57 29.11v844.63l8.57 8.55 392.06-231.75z"/><path fill="#8C8C8C" d="M392.07 0 0 650.54l392.07 231.75V472.33z"/><path fill="#3C3C3B" d="m392.07 956.52-4.83 5.89v300.87l4.83 14.1 392.3-552.49z"/><path fill="#8C8C8C" d="M392.07 1277.38V956.52L0 724.89z"/><path fill="#141414" d="m392.07 882.29 392.06-231.75-392.06-178.21z"/>
        <path fill="#393939" d="m0 650.54 392.07 231.75V472.33z"/></g></svg>                                                    <span class="crypto-name small">Ethereum</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="crypto-option" data-value="LTC">
                                                <input type="radio" name="payment_gateway" id="LTC" value="LTC" class="d-none crypto-radio">
                                                <label for="LTC" class="crypto-label text-center p-2 rounded-3 border w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                                    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 82.6 82.6"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon mb-1"
                data-name="Layer 1">
    <circle cx="41.3" cy="41.3" r="36.83" style="fill:#fff"/><path d="M41.3 0a41.3 41.3 0 1 0 41.3 41.3A41.18 41.18 0 0 0 41.54 0Zm.7 42.7-4.3 14.5h23a1.16 1.16 0 0 1 1.2 1.12v.38l-2 6.9a1.49 1.49 0 0 1-1.5 1.1H23.2l5.9-20.1-6.6 2L24 44l6.6-2 8.3-28.2a1.51 1.51 0 0 1 1.5-1.1h8.9a1.16 1.16 0 0 1 1.2 1.12v.38l-7 23.8 6.6-2-1.4 4.8Z" style="fill:#345d9d"/></svg>                                                    <span class="crypto-name small">Litecoin</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="crypto-option" data-value="BTC">
                                                <input type="radio" name="payment_gateway" id="BTC" value="BTC" class="d-none crypto-radio">
                                                <label for="BTC" class="crypto-label text-center p-2 rounded-3 border w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                                    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 4091.27 4091.73"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon mb-1"
                xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" image-rendering="optimizeQuality"
        shape-rendering="geometricPrecision" text-rendering="geometricPrecision">
    <g fill-rule="nonzero"><path fill="#F7931A" d="M4030.06 2540.77C3756.82 3636.78 2646.74 4303.79 1550.6 4030.48 454.92 3757.24-212.09 2647.09 61.27 1551.17c273.12-1096.13 1383.2-1763.19 2479-1489.95C3636.33 334.46 4303.3 1444.73 4030.03 2540.79l.02-.02z"/><path fill="#fff" d="M2947.77 1754.38c40.72-272.26-166.56-418.61-450-516.24l91.95-368.8-224.5-55.94-89.51 359.09c-59.02-14.72-119.63-28.59-179.87-42.34L2186 768.69l-224.36-55.94-92 368.68c-48.84-11.12-96.81-22.11-143.35-33.69l.26-1.16-309.59-77.31-59.72 239.78s166.56 38.18 163.05 40.53c90.91 22.69 107.35 82.87 104.62 130.57l-104.74 420.15c6.26 1.59 14.38 3.89 23.34 7.49-7.49-1.86-15.46-3.89-23.73-5.87l-146.81 588.57c-11.11 27.62-39.31 69.07-102.87 53.33 2.25 3.26-163.17-40.72-163.17-40.72l-111.46 256.98 292.15 72.83c54.35 13.63 107.61 27.89 160.06 41.3l-92.9 373.03 224.24 55.94 92-369.07c61.26 16.63 120.71 31.97 178.91 46.43l-91.69 367.33 224.51 55.94 92.89-372.33c382.82 72.45 670.67 43.24 791.83-303.02 97.63-278.78-4.86-439.58-206.26-544.44 146.69-33.83 257.18-130.31 286.64-329.61l-.07-.05zm-512.93 719.26c-69.38 278.78-538.76 128.08-690.94 90.29l123.28-494.2c152.17 37.99 640.17 113.17 567.67 403.91zm69.43-723.3c-63.29 253.58-453.96 124.75-580.69 93.16l111.77-448.21c126.73 31.59 534.85 90.55 468.94 355.05h-.02z"/></g>
</svg>                                                    <span class="crypto-name small">Bitcoin</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="crypto-option" data-value="BNB" data-has-tokens="true">
                                                <input type="radio" name="payment_gateway" id="BNB" value="BNB" class="d-none crypto-radio">
                                                <label for="BNB" class="crypto-label text-center p-2 rounded-3 border w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                                    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 2496 2496"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon mb-1"
                xml:space="preserve"
     style="enable-background:new 0 0 2496 2496">
    <path d="M1248 0c689.3 0 1248 558.7 1248 1248s-558.7 1248-1248 1248S0 1937.3 0 1248 558.7 0 1248 0z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#f0b90b"/><path d="m685.9 1248 .9 330 280.4 165v193.2l-444.5-260.7v-524l163.2 96.5zm0-330v192.3l-163.3-96.6V821.4l163.3-96.6L850 821.4 685.9 918zm398.4-96.6 163.3-96.6 164.1 96.6-164.1 96.6-163.3-96.6z" style="fill:#fff"/><path d="M803.9 1509.6v-193.2l163.3 96.6v192.3l-163.3-95.7zm280.4 302.6 163.3 96.6 164.1-96.6v192.3l-164.1 96.6-163.3-96.6v-192.3zm561.6-990.8 163.3-96.6 164.1 96.6v192.3l-164.1 96.6V918l-163.3-96.6zm163.3 756.6.9-330 163.3-96.6v524l-444.5 260.7v-193.2l280.3-164.9z" style="fill:#fff"/><path d="m1692.1 1509.6-163.3 95.7V1413l163.3-96.6v193.2z" style="fill:#fff"/><path d="m1692.1 986.4.9 193.2-281.2 165v330.8l-163.3 95.7-163.3-95.7v-330.8l-281.2-165V986.4l164-96.6 279.5 165.8 281.2-165.8 164.1 96.6h-.7zM803.9 656.5l443.7-261.6 444.5 261.6-163.3 96.6-281.2-165.8-280.4 165.8-163.3-96.6z" style="fill:#fff"/></svg>                                                    <span class="crypto-name small">BNB</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Network selection for tokens (initially hidden) -->
                            <div class="mb-3 network-tokens-container d-none" id="ethTokens">
                                <label class="fw-bold form-label text-secondary">Select Token</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="token-option">
                                            <input type="radio" name="eth_token" id="ETH-main" value="ETH" class="d-none token-radio" checked>
                                            <label for="ETH-main" class="token-label text-center p-2 rounded-3 border w-100 d-flex align-items-center">
                                                <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 784.37 1277.39"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon me-2"
                xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" image-rendering="optimizeQuality"
        shape-rendering="geometricPrecision" text-rendering="geometricPrecision" ><g fill-rule="nonzero"><path fill="#343434" d="m392.07 0-8.57 29.11v844.63l8.57 8.55 392.06-231.75z"/><path fill="#8C8C8C" d="M392.07 0 0 650.54l392.07 231.75V472.33z"/><path fill="#3C3C3B" d="m392.07 956.52-4.83 5.89v300.87l4.83 14.1 392.3-552.49z"/><path fill="#8C8C8C" d="M392.07 1277.38V956.52L0 724.89z"/><path fill="#141414" d="m392.07 882.29 392.06-231.75-392.06-178.21z"/>
        <path fill="#393939" d="m0 650.54 392.07 231.75V472.33z"/></g></svg>                                                <span>ETH (Native)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="token-option">
                                            <input type="radio" name="eth_token" id="ETH-USDT" value="ETH-USDT" class="d-none token-radio">
                                            <label for="ETH-USDT" class="token-label text-center p-2 rounded-3 border w-100 d-flex align-items-center">
                                                <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 339.43 295.27"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon me-2"
                data-name="Layer 1"><path d="m62.15 1.45-61.89 130a2.52 2.52 0 0 0 .54 2.94l167.15 160.17a2.55 2.55 0 0 0 3.53 0L338.63 134.4a2.52 2.52 0 0 0 .54-2.94l-61.89-130A2.5 2.5 0 0 0 275 0H64.45a2.5 2.5 0 0 0-2.3 1.45Z" style="fill:#50af95;fill-rule:evenodd"/><path d="M191.19 144.8c-1.2.09-7.4.46-21.23.46-11 0-18.81-.33-21.55-.46-42.51-1.87-74.24-9.27-74.24-18.13s31.73-16.25 74.24-18.15v28.91c2.78.2 10.74.67 21.74.67 13.2 0 19.81-.55 21-.66v-28.9c42.42 1.89 74.08 9.29 74.08 18.13s-31.65 16.24-74.08 18.12Zm0-39.25V79.68h59.2V40.23H89.21v39.45h59.19v25.86c-48.11 2.21-84.29 11.74-84.29 23.16s36.18 20.94 84.29 23.16v82.9h42.78v-82.93c48-2.21 84.12-11.73 84.12-23.14s-36.09-20.93-84.12-23.15Zm0 0Z" style="fill:#fff;fill-rule:evenodd"/>
</svg>                                                <span>USDT</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="token-option">
                                            <input type="radio" name="eth_token" id="ETH-USDC" value="ETH-USDC" class="d-none token-radio">
                                            <label for="ETH-USDC" class="token-label text-center p-2 rounded-3 border w-100 d-flex align-items-center">
                                                <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 2000 2000"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon me-2"
                data-name="86977684-12db-4850-8f30-233a7c267d11"><path fill="#2775ca" d="M1000 2000c554.17 0 1000-445.83 1000-1000S1554.17 0 1000 0 0 445.83 0 1000s445.83 1000 1000 1000z"/><path fill="#fff" d="M1275 1158.33c0-145.83-87.5-195.83-262.5-216.66-125-16.67-150-50-150-108.34s41.67-95.83 125-95.83c75 0 116.67 25 137.5 87.5 4.17 12.5 16.67 20.83 29.17 20.83h66.66c16.67 0 29.17-12.5 29.17-29.16v-4.17c-16.67-91.67-91.67-162.5-187.5-170.83v-100c0-16.67-12.5-29.17-33.33-33.34h-62.5c-16.67 0-29.17 12.5-33.34 33.34v95.83c-125 16.67-204.16 100-204.16 204.17 0 137.5 83.33 191.66 258.33 212.5 116.67 20.83 154.17 45.83 154.17 112.5s-58.34 112.5-137.5 112.5c-108.34 0-145.84-45.84-158.34-108.34-4.16-16.66-16.66-25-29.16-25h-70.84c-16.66 0-29.16 12.5-29.16 29.17v4.17c16.66 104.16 83.33 179.16 220.83 200v100c0 16.66 12.5 29.16 33.33 33.33h62.5c16.67 0 29.17-12.5 33.34-33.33v-100c125-20.84 208.33-108.34 208.33-220.84z"/><path fill="#fff" d="M787.5 1595.83c-325-116.66-491.67-479.16-370.83-800 62.5-175 200-308.33 370.83-370.83 16.67-8.33 25-20.83 25-41.67V325c0-16.67-8.33-29.17-25-33.33-4.17 0-12.5 0-16.67 4.16-395.83 125-612.5 545.84-487.5 941.67 75 233.33 254.17 412.5 487.5 487.5 16.67 8.33 33.34 0 37.5-16.67 4.17-4.16 4.17-8.33 4.17-16.66v-58.34c0-12.5-12.5-29.16-25-37.5zm441.67-1300c-16.67-8.33-33.34 0-37.5 16.67-4.17 4.17-4.17 8.33-4.17 16.67v58.33c0 16.67 12.5 33.33 25 41.67 325 116.66 491.67 479.16 370.83 800-62.5 175-200 308.33-370.83 370.83-16.67 8.33-25 20.83-25 41.67V1700c0 16.67 8.33 29.17 25 33.33 4.17 0 12.5 0 16.67-4.16 395.83-125 612.5-545.84 487.5-941.67-75-237.5-258.34-416.67-487.5-491.67z"/>
</svg>                                                <span>USDC</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 network-tokens-container d-none" id="bnbTokens">
                                <label class="fw-bold form-label text-secondary">Select Token</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="token-option">
                                            <input type="radio" name="bnb_token" id="BNB-main" value="BNB" class="d-none token-radio" checked>
                                            <label for="BNB-main" class="token-label text-center p-2 rounded-3 border w-100 d-flex align-items-center">
                                                <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 2496 2496"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon me-2"
                xml:space="preserve"
     style="enable-background:new 0 0 2496 2496">
    <path d="M1248 0c689.3 0 1248 558.7 1248 1248s-558.7 1248-1248 1248S0 1937.3 0 1248 558.7 0 1248 0z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#f0b90b"/><path d="m685.9 1248 .9 330 280.4 165v193.2l-444.5-260.7v-524l163.2 96.5zm0-330v192.3l-163.3-96.6V821.4l163.3-96.6L850 821.4 685.9 918zm398.4-96.6 163.3-96.6 164.1 96.6-164.1 96.6-163.3-96.6z" style="fill:#fff"/><path d="M803.9 1509.6v-193.2l163.3 96.6v192.3l-163.3-95.7zm280.4 302.6 163.3 96.6 164.1-96.6v192.3l-164.1 96.6-163.3-96.6v-192.3zm561.6-990.8 163.3-96.6 164.1 96.6v192.3l-164.1 96.6V918l-163.3-96.6zm163.3 756.6.9-330 163.3-96.6v524l-444.5 260.7v-193.2l280.3-164.9z" style="fill:#fff"/><path d="m1692.1 1509.6-163.3 95.7V1413l163.3-96.6v193.2z" style="fill:#fff"/><path d="m1692.1 986.4.9 193.2-281.2 165v330.8l-163.3 95.7-163.3-95.7v-330.8l-281.2-165V986.4l164-96.6 279.5 165.8 281.2-165.8 164.1 96.6h-.7zM803.9 656.5l443.7-261.6 444.5 261.6-163.3 96.6-281.2-165.8-280.4 165.8-163.3-96.6z" style="fill:#fff"/></svg>                                                <span>BNB (Native)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="token-option">
                                            <input type="radio" name="bnb_token" id="BNB-USDT" value="BNB-USDT" class="d-none token-radio">
                                            <label for="BNB-USDT" class="token-label text-center p-2 rounded-3 border w-100 d-flex align-items-center">
                                                <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 339.43 295.27"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon me-2"
                data-name="Layer 1"><path d="m62.15 1.45-61.89 130a2.52 2.52 0 0 0 .54 2.94l167.15 160.17a2.55 2.55 0 0 0 3.53 0L338.63 134.4a2.52 2.52 0 0 0 .54-2.94l-61.89-130A2.5 2.5 0 0 0 275 0H64.45a2.5 2.5 0 0 0-2.3 1.45Z" style="fill:#50af95;fill-rule:evenodd"/><path d="M191.19 144.8c-1.2.09-7.4.46-21.23.46-11 0-18.81-.33-21.55-.46-42.51-1.87-74.24-9.27-74.24-18.13s31.73-16.25 74.24-18.15v28.91c2.78.2 10.74.67 21.74.67 13.2 0 19.81-.55 21-.66v-28.9c42.42 1.89 74.08 9.29 74.08 18.13s-31.65 16.24-74.08 18.12Zm0-39.25V79.68h59.2V40.23H89.21v39.45h59.19v25.86c-48.11 2.21-84.29 11.74-84.29 23.16s36.18 20.94 84.29 23.16v82.9h42.78v-82.93c48-2.21 84.12-11.73 84.12-23.14s-36.09-20.93-84.12-23.15Zm0 0Z" style="fill:#fff;fill-rule:evenodd"/>
</svg>                                                <span>USDT</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="token-option">
                                            <input type="radio" name="bnb_token" id="BNB-USDC" value="BNB-USDC" class="d-none token-radio">
                                            <label for="BNB-USDC" class="token-label text-center p-2 rounded-3 border w-100 d-flex align-items-center">
                                                <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 2000 2000"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="crypto-icon me-2"
                data-name="86977684-12db-4850-8f30-233a7c267d11"><path fill="#2775ca" d="M1000 2000c554.17 0 1000-445.83 1000-1000S1554.17 0 1000 0 0 445.83 0 1000s445.83 1000 1000 1000z"/><path fill="#fff" d="M1275 1158.33c0-145.83-87.5-195.83-262.5-216.66-125-16.67-150-50-150-108.34s41.67-95.83 125-95.83c75 0 116.67 25 137.5 87.5 4.17 12.5 16.67 20.83 29.17 20.83h66.66c16.67 0 29.17-12.5 29.17-29.16v-4.17c-16.67-91.67-91.67-162.5-187.5-170.83v-100c0-16.67-12.5-29.17-33.33-33.34h-62.5c-16.67 0-29.17 12.5-33.34 33.34v95.83c-125 16.67-204.16 100-204.16 204.17 0 137.5 83.33 191.66 258.33 212.5 116.67 20.83 154.17 45.83 154.17 112.5s-58.34 112.5-137.5 112.5c-108.34 0-145.84-45.84-158.34-108.34-4.16-16.66-16.66-25-29.16-25h-70.84c-16.66 0-29.16 12.5-29.16 29.17v4.17c16.66 104.16 83.33 179.16 220.83 200v100c0 16.66 12.5 29.16 33.33 33.33h62.5c16.67 0 29.17-12.5 33.34-33.33v-100c125-20.84 208.33-108.34 208.33-220.84z"/><path fill="#fff" d="M787.5 1595.83c-325-116.66-491.67-479.16-370.83-800 62.5-175 200-308.33 370.83-370.83 16.67-8.33 25-20.83 25-41.67V325c0-16.67-8.33-29.17-25-33.33-4.17 0-12.5 0-16.67 4.16-395.83 125-612.5 545.84-487.5 941.67 75 233.33 254.17 412.5 487.5 487.5 16.67 8.33 33.34 0 37.5-16.67 4.17-4.16 4.17-8.33 4.17-16.66v-58.34c0-12.5-12.5-29.16-25-37.5zm441.67-1300c-16.67-8.33-33.34 0-37.5 16.67-4.17 4.17-4.17 8.33-4.17 16.67v58.33c0 16.67 12.5 33.33 25 41.67 325 116.66 491.67 479.16 370.83 800-62.5 175-200 308.33-370.83 370.83-16.67 8.33-25 20.83-25 41.67V1700c0 16.67 8.33 29.17 25 33.33 4.17 0 12.5 0 16.67-4.16 395.83-125 612.5-545.84 487.5-941.67-75-237.5-258.34-416.67-487.5-491.67z"/>
</svg>                                                <span>USDC</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @csrf
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary shadow-sm w-100 fw-bold">
                                    <i class="bi bi-wallet-fill me-2"></i>Add Credit
                                </button>
                            </div>
                        </form>
                        <p class="mb-0 mt-3">
                            Please make sure to read our 
                            <a href="#" data-toggle="modal" data-target="#tosModal" class="font-weight-bold">Terms of Service</a>
                            .
                        </p>
                    </div>
                </div>
        </div>

    <div class="modal fade" id="giftVIPModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gift VIP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Using your account balance, you're able to gift 
                        <span id="gifting-vip-package-name" class="font-weight-bold"></span>
                         to other players.
                    </p>
                    <div id="gifting-alert-messages"></div>
                    <form method="POST" id="gift-vip-form" class="form" style="display: inline-block;" action="{{ route('store.gift.vip') }}">
    @csrf

    <div class="form-group">
        <label for="username" class="font-weight-bold">Username</label>
        <input type="text" name="recipient" id="username" class="form-control" required>
    </div>

    <input type="hidden" name="product" value>

    <div id="confirmation-section" style="display: none;">
        <div class="form-group">
            <p>Confirm the following details:</p>
            <p id="confirmation-details"></p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="confirm" id="confirm-checkbox">
                <label class="form-check-label" for="confirm-checkbox">
                    I confirm the above details are correct.
                </label>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success">Gift</button>
</form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bronzeVIPModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bronze VIP (£5)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Bronze VIP currently features the following perks listed below:</b>
                    </p>
                    <ul>
                        <li>Bronze VIP badge</li>
                        <li>Bronze VIP catalog.</li>
                        <li>1 Chat text colours. </li>
                        <li>Mimic command (:mimic)</li>
                        <li>Super pull command (:spull)</li>
                        <li>Super push command (:spush)</li>
                        <li>Bubble command (:bubble %id%)</li>
                        <li>Reduced flooding (10 seconds).</li>
                        <li>15 daily respect &amp; scratches (5 extra).</li>
                        <li>Ability to enter rooms when they're full. </li>
                        <li>Exclusive effect (:enable 191) </li>
                        <li>Ability to change your username weekly (:flagme)</li>
                        <li class="font-weight-bolder">600 credits per 15 minute cycle.</li>
                        <li class="font-weight-bolder">400 duckets per 15 minute cycle.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="silverVIPModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Silver VIP (£7)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Silver VIP currently features the following perks listed below:</b>
                    </p>
                    <ul>
                        <li>Silver VIP badge</li>
                        <li>Bronze &amp; Silver VIP catalog.</li>
                        <li>3 Chat text colours. </li>
                        <li>Super pull command (:spull)</li>
                        <li>Super push command (:spush)</li>
                        <li>Bubble command (:bubble %id%)</li>
                        <li>Room alert command (:roomalert %message%)</li>
                        <li>Reduced flooding (7 seconds).</li>
                        <li>20 daily respect &amp; scratches (10 extra).</li>
                        <li>Ability to change your username daily (:flagme)</li>
                        <li class="font-weight-bolder">800 credits per 15 minute cycle.</li>
                        <li class="font-weight-bolder">500 duckets per 15 minute cycle.</li>
                        <li>Ability to enter rooms when they're full. </li>
                        <li>Exclusive effect (:enable 191) </li>
                        <li>Ability to request a member of staff to supervise your events.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="goldVIPModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gold VIP (£12)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Gold VIP currently features the following perks listed below:</b>
                    </p>
                    <ul>
                        <li>Gold VIP badge</li>
                        <li>Bronze, Silver &amp; Gold VIP catalog.</li>
                        <li>5 Chat text colours. </li>
                        <li>Super pull command (:spull)</li>
                        <li>Super push command (:spush)</li>
                        <li>Bubble command (:bubble %id%)</li>
                        <li>Room alert command (:roomalert %message%)</li>
                        <li>Reduced flooding (3 seconds).</li>
                        <li>25 daily respect &amp; scratches (15 extra).</li>
                        <li>Ability to change your username daily (:flagme)</li>
                        <li class="font-weight-bolder">1000 credits per 15 minute cycle.</li>
                        <li class="font-weight-bolder">600 duckets per 15 minute cycle.</li>
                        <li>Ability to enter rooms when they're full. </li>
                        <li>Exclusive effect (:enable 191) </li>
                        <li>Exclusive effect badge (:enable 178).</li>
                        <li>Ability to request a member of staff to supervise your events.</li>
                        <li>Ability to use the :eha command to have your event put into the event alert queue.</li>
                        <li>Ability to set an effect on your room bots. (:botenable %id%) or (:botenable %id% %name%) </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tosModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms of Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Purchasing ranks and items through SwiftPay, Selly, or PayPal is considered a donation, and refunds will not be issued under any circumstances. The rewards provided for your purchase are a token of our gratitude for supporting and sustaining our online community.</p>
                    <p>If your account is found in violation of our community guidelines, it may result in a ban, and you will not be entitled to a refund. Furthermore, users are prohibited from filing disputes or claims, as they have already received the purchased item(s) and agreed to the terms upon signing up for the site. Any threat or actual initiation of a claim or dispute through the chosen payment platform may lead to a permanent ban until the matter is resolved.</p>
                    <p>By purchasing anything from SwiftPay, Selly, or PayPal and checking the accept box, you explicitly agree to abide by these Terms and Conditions. In the event of a dispute, we encourage users to contact us directly for resolution before resorting to filing a claim or dispute with the respective payment platform. Failure to follow this procedure may result in account suspension until the issue is resolved.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cryptoRadios = document.querySelectorAll('.crypto-radio');
            const tokenContainers = document.querySelectorAll('.network-tokens-container');
            const form = document.getElementById('topupForm');

            cryptoRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    tokenContainers.forEach(container => {
                        container.classList.add('d-none');
                    });

                    const selectedOption = this.closest('.crypto-option');
                    const hasTokens = selectedOption.dataset.hasTokens === 'true';
                    const value = selectedOption.dataset.value;

                    if (hasTokens) {
                        if (value === 'ETH') {
                            document.getElementById('ethTokens').classList.remove('d-none');
                        } else if (value === 'BNB') {
                            document.getElementById('bnbTokens').classList.remove('d-none');
                        }
                    }
                });
            });

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const selectedCrypto = document.querySelector('.crypto-radio:checked');
                if (!selectedCrypto) {
                    alert('Please select a cryptocurrency');
                    return;
                }

                let finalValue = selectedCrypto.value;

                // Check if tokens are visible and get selected token
                if (selectedCrypto.value === 'ETH') {
                    const selectedEthToken = document.querySelector('input[name="eth_token"]:checked');
                    if (selectedEthToken && selectedEthToken.value !== 'ETH') {
                        finalValue = selectedEthToken.value;
                    }
                } else if (selectedCrypto.value === 'BNB') {
                    const selectedBnbToken = document.querySelector('input[name="bnb_token"]:checked');
                    if (selectedBnbToken && selectedBnbToken.value !== 'BNB') {
                        finalValue = selectedBnbToken.value;
                    }
                }

                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'payment_gateway';
                hiddenInput.value = finalValue;
                form.appendChild(hiddenInput);

                form.submit();
            });
        });
    </script>
</body>
</html>
@endsection