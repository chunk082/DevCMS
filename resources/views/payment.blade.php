@php
    use Carbon\Carbon;

    $now = now();
    $expiresAt = Carbon::parse($payment->expires_at);

    if ($expiresAt->isPast()) {
        $countdownText = 'Expired';
    } else {
        $secondsLeft = $expiresAt->diffInSeconds($now);
        $minutes = floor($secondsLeft / 60);
        $seconds = $secondsLeft % 60;
        $countdownText = "{$minutes}m {$seconds}s";
    }
@endphp


@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Store
@endsection

@section('content')
           <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="silver">Payment Guide</h5>

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <div class="d-flex">
                                <div class="me-2">
                                    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="text-success"
        >
    <path d="M256 512a256 256 0 1 0 0-512 256 256 0 1 0 0 512zm113-303L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
</svg>                              </div>
                                <div>Send the <strong>exact amount</strong> shown to the provided address</div>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="d-flex">
                                <div class="me-2">
                                    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="text-success"
        >
    <path d="M256 512a256 256 0 1 0 0-512 256 256 0 1 0 0 512zm113-303L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
</svg>                              </div>
                              <div>Make sure to use the <strong>BTC</strong> network</div>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="d-flex">
                                <div class="me-2">
                                    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class="text-success"
        >
    <path d="M256 512a256 256 0 1 0 0-512 256 256 0 1 0 0 512zm113-303L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
</svg>                                </div>
                                <div>Payment will be processed automatically once confirmed</div>
                            </div>
                        </li>
                                                    <li>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
        width="1.5em"
        height="1.5em"
        fill="currentColor"
        class=""
        >
    <path d="M256 0a256 256 0 1 1 0 512 256 256 0 1 1 0-512zm-24 120v136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
</svg>                                    </div>
                                    <div>This payment will expire in <strong><span id="countdown">{{ $countdownText }}</span></strong></div>
                                </div>
                            </li>
                                            </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="silver">Payment Details</h5>

                    <div class="alert alert-warning mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1.5em" height="1.5em" fill="currentColor">
                            <path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7.2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8.2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24v112c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0-64 0 32 32 0 1 0 64 0z"/>
                        </svg>
                        <strong>Important:</strong> Use the correct network (e.g., ERC20 for ETH, BSC for BNB).
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Send the exact amount below</h6>
                                    <small class="text-muted">Sending the wrong amount can delay processing</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="fw-bold mb-2">Amount to send</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $payment->amount_crypto }}" id="cryptoAmount" readonly>
                                    <span class="input-group-text">{{ strtoupper($payment->payment_gateway) }}</span>
                                    <button class="btn btn-secondary" type="button" onclick="copyToClipboard('cryptoAmount')">
                                        Copy
                                    </button>
                                </div>
                                <p class="text-muted small mt-2">~${{ $payment->amount }} USD</p>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="fw-bold mb-2">Address</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $payment->address }}" id="cryptoAddress" readonly>
                                    <button class="btn btn-secondary" type="button" onclick="copyToClipboard('cryptoAddress')">
                                        Copy
                                    </button>
                                </div>
                                <p class="text-muted small mt-2">Send only {{ strtoupper($payment->payment_gateway) }} to this address.</p>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-primary d-flex">
                        <small>Your payment will be processed once it is confirmed on the blockchain.</small>
                    </div>

                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('store') }}" class="btn btn-secondary">Back to Store</a>
            </div>
        </div>
    </div>

    <script>
    window.paymentExpiresAt = "{{ $expiresAt }}";

    function copyToClipboard(elementId) {
        const element = document.getElementById(elementId);
        element.select();
        document.execCommand('copy');

        const button = element.nextElementSibling.nextElementSibling;
        const originalContent = button.innerHTML;
        button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>';

        setTimeout(() => {
            button.innerHTML = originalContent;
        }, 1500);
    }

    const checkPaymentStatus = function () {
        fetch(`/store/payment/{{ $payment->id }}/status`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'completed') {
                    window.location.reload();
                } else if (data.status === 'partial' && !document.getElementById('partial-payment-alert')) {
                    const alertDiv = document.createElement('div');
                    alertDiv.id = 'partial-payment-alert';
                    alertDiv.className = 'alert alert-warning';
                    alertDiv.innerHTML = `
                        <strong>Partial Payment:</strong> You've sent <strong>${data.data.amount}</strong> but <strong>${data.data.expected}</strong> was expected.
                        <br>
                        Please send <strong>${data.data.remaining}</strong> more to complete your payment.
                    `;

                    const hereDiv = document.querySelector('.here');
                    if (hereDiv) hereDiv.parentNode.insertBefore(alertDiv, hereDiv);
                }
            })
            .catch(error => console.error('Status check failed:', error));
    };

    setInterval(checkPaymentStatus, 5000);
    checkPaymentStatus();
</script>
@endsection
