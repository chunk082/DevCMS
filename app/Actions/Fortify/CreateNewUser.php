<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Str;
use App\Services\RconService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Rules\Turnstile;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input ): User
    {

        $ip = request()->ip();
        
        $users = User::where(function ($query) use ($ip) {
            $query->where('ip_register', $ip)->orWhere('ip_current', $ip);
        })->count();

        if ($users >= 3) {
            throw ValidationException::withMessages([
                'username' => ['You can only have a maximum of 3 accounts.'],
            ]);
        }

        Validator::make($input, [
    'username' => ['required', 'string', 'max:255', 'unique:users,username'],
    'mail' => ['required', 'string', 'email:dns', 'max:255', 'unique:users,mail'],
    'password' => $this->passwordRules(),
    'cf-turnstile-response' => ['required', new Turnstile],
])->validate();

// Additional manual check:
$disposableDomains = [
    'lol.com', 'asd.com', 'mailinator.com', '10minutemail.com', 'tempmail.com', 'guerrillamail.com', 'fakeinbox.com'
];

$emailDomain = substr(strrchr($input['mail'], "@"), 1);

if (in_array(strtolower($emailDomain), $disposableDomains)) {
    throw ValidationException::withMessages([
        'mail' => 'Please use a real email address.',
    ]);
}


        return User::create([
            'username' => $input['username'],
            'mail' => $input['mail'],
            'password' => Hash::make($input['password']),
            'ip_register' => $ip, // Save the user's IP address
            'ip_current' => $ip, // Save the user IP
        ]);
    }
}