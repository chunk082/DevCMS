<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'cf-turnstile-response' => ['required', 'string'],
        ];
    }

    /**
     * Authenticate the user and validate the Turnstile captcha.
     */
    public function authenticate(): void
    {
        $captchaResponse = $this->input('cf-turnstile-response');
        $secretKey = '0x4AAAAAAA_B7zh66YElgVHn_AZstAvc5y4';

        // Validate Cloudflare Turnstile
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => $secretKey,
            'response' => $captchaResponse,
            'remoteip' => $this->ip(),
        ]);

        $result = $response->json();

        if (!$result['success']) {
            throw ValidationException::withMessages([
                'cf-turnstile-response' => 'Captcha verification failed.',
            ]);
        }

        // Perform authentication using 'username' instead of 'email'
        if (!auth()->attempt($this->only('username', 'password'), $this->boolean('remember'))) {
            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
            ]);
        }
    }
}
