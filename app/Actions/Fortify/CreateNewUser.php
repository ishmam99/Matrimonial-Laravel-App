<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Certificate;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
       // dd($input);
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'ancestry' => ['string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'website' => ['required', 'string', 'max:255'],
            'telegram' => ['required', 'string', 'max:255'],
            'marital_status' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'looking_for' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'account_type' => ['required', 'string', 'max:255'],
            'referral_code' => ['string', 'max:255'],
            'otp_code' => ['string', 'max:255'],
            'otp_expire_time' => ['string', 'max:255'],
            'package_id' => ['required', 'string', 'max:255'],
            'referral_code' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',


        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'ancestry' => $input['ancestry'],
            'phone' => $input['phone'],
            'website' => $input['website'],
            'telegram' => $input['telegram'],
            'password' => $input['password'],
            'marital_status' => $input['marital_status'],
            'religion' => $input['religion'],
            'looking_for' => $input['looking_for'],
            'gender' => $input['gender'],
            'account_type' => $input['account_type'],
            'referral_code' => $input['referral_code'],
            'otp_code' => $input['otp_code'],
            'otp_expire_time' => $input['otp_expire_time'],
            'package_id' => $input['package_id'],
            'referral_code' => $input['referral_code'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),

            'cover_photo' => $input['cover_photo'],
            'profile_photo' => $input['profile_photo'],
            'nid' => $input['nid'],
            'verification' => $input['verification'],
            'skin_tone' => $input['skin_tone'],
            'notification' => $input['notification'],
            'political_point' => $input['political_point'],
            'religion_point' => $input['religion_point'],
            'short_intro' => $input['short_intro'],
            'medical_history' => $input['medical_history'],


        ])->assignRole('User');


    }
}
