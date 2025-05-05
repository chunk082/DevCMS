<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Turnstile implements Rule
{
    public function passes($attribute, $value)
    {
        Log::info('🚦 Turnstile Rule Triggered', ['token' => $value]);

        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.turnstile.secret'),
            'response' => $value,
            'remoteip' => request()->ip(),
        ]);

        $responseData = $response->json();
        Log::info('🛡 Turnstile Verification Response', $responseData);

        return $responseData['success'] === true;
    }

    public function message()
    {
        return 'Turnstile verification failed.';
    }
}
