<?php

namespace App\Actions\Fortify;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
   public function create(array $input): User
{
    Validator::make($input, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => $this->passwordRules(),
        'phone' => ['required', 'string', 'max:20'],
        'cnic' => ['required', 'string', 'unique:users'],
        'city' => ['required', 'string', 'max:255'],
        'address' => ['required', 'string', 'max:255'],
        'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature()
            ? ['accepted', 'required']
            : '',
    ])->validate();

    $profilePhoto = null;

    if (isset($input['profile_photo'])) {
        $profilePhoto = $input['profile_photo']->store(
            'profile-photos',
            'public'
        );
    }

    $user = User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'phone' => $input['phone'],
        'cnic' => $input['cnic'],
        'city' => $input['city'],
        'address' => $input['address'],
        'profile_photo_path' => $profilePhoto,
    ]);

    // Send Welcome Email
    Mail::to($user->email)->send(new WelcomeMail($user));

    return $user;
}
}
