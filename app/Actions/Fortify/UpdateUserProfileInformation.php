<?php

namespace App\Actions\Fortify;

use App\Models\Job;
use App\Models\Hobby;
use App\Models\Certificate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        abort_if(\Gate::denies('profile.edit'), 403);

        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'ancestry' => ['nullable', 'image', 'max:1024'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required', 'string', 'max:255'],
            'website' => ['required', 'string', 'max:255'],
            'telegram' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'marital_status' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'otp_code' => ['required', 'string', 'max:255'],
            'otp_expire_time' => ['required', 'string', 'max:255'],
            'looking_for' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'account_type' => ['required', 'string', 'max:255'],
            'referral_code' => ['required', 'string', 'max:255'],
            'package_id' => ['required', 'string', 'max:255'],


            'cover_photo' => ['nullable', 'image', 'max:1024'],
            'profile_photo' => ['nullable', 'image', 'max:1024'],
            'nid' => ['nullable', 'image', 'max:1024'],
            'verification' => ['required', 'string', 'max:255'],
            'skin_tone' => ['required', 'string', 'max:255'],
            'notification' => ['required', 'string', 'max:255'],
            'political_point' => ['required', 'string'],
            'religion_point' => ['required', 'string'],
            'short_intro' => ['required', 'string'],
            'medical_history' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'first_name'       => $input['first_name'],
                'last_name'        => $input['last_name'],
                'ancestry'         => $input['ancestry'],
                'email'            => $input['email'],
                'phone'            => $input['phone'],
                'website'          => $input['website'],
                'telegram'         => $input['telegram'],
                'password'         => $input['password'],
                'marital_status'   => $input['marital_status'],
                'religion'         => $input['religion'],
                'otp_code'         => $input['otp_code'],
                'otp_expire_time'  => $input['otp_expire_time'],
                'looking_for'      => $input['looking_for'],
                'gender'           => $input['gender'],
                'account_type'     => $input['account_type'],
                'referral_code'    => $input['referral_code'],
                'package_id'       => $input['package_id'],


                'cover_photo'      => $input['cover_photo'],
                'profile_photo'    => $input['profile_photo'],
                'nid'              => $input['nid'],
                'verification'     => $input['verification'],
                'skin_tone'        => $input['skin_tone'],
                'notification'     => $input['notification'],
                'political_point'  => $input['political_point'],
                'religion_point'   => $input['religion_point'],
                'short_intro'      => $input['short_intro'],
                'medical_history'  => $input['medical_history'],
            ])->save();
        }

        $user->certificates->update([
            'certificate_image' => $input['certificate_image'],
            'status' => $input['status'],

        ]);

        $user->hobbies->update([
            'hobby'=> $input['hobby'],

        ]);

        $user->jobs->update([
            'company_name'=> $input['company_name'],
            'year_started'=> $input['year_started'],
            'year_ended' => $input['year_ended'],
            'description' => $input['description'],
        ]);

        $user->physicalDisabilities->update([
            'physical_disabilities'=> $input['physical_disabilities'],

        ]);

        $user->placesLiveds->update([
            'places_lived'=> $input['places_lived'],

        ]);

        $user->qualities->update([
            'quality'=> $input['quality'],

        ]);



        session()->flash('success', 'Profile Updated.');
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'first_name'           => $input['first_name'],
            'last_name'            => $input['last_name'],
            'ancestry'             => $input['ancestry'],
            'email'                => $input['email'],
            'phone'                => $input['phone'],
            'website'              => $input['website'],
            'telegram'             => $input['telegram'],
            'password'             => $input['password'],
            'marital_status'       => $input['marital_status'],
            'religion'             => $input['religion'],
            'otp_code'             => $input['otp_code'],
            'otp_expire_time'      => $input['otp_expire_time'],
            'looking_for'          => $input['looking_for'],
            'gender'               => $input['gender'],
            'account_type'         => $input['account_type'],
            'referral_code'        => $input['referral_code'],
            'package_id'           => $input['package_id'],
            'email_verified_at'    => null,

            'cover_photo'          => $input['cover_photo'],
            'profile_photo'        => $input['profile_photo'],
            'nid'                  => $input['nid'],
            'verification'         => $input['verification'],
            'skin_tone'            => $input['skin_tone'],
            'notification'         => $input['notification'],
            'political_point'      => $input['political_point'],
            'religion_point'       => $input['religion_point'],
            'short_intro'          => $input['short_intro'],
            'medical_history'      => $input['medical_history'],
        ])->save();


        $user->certificates->update([
            'certificate_image' => $input['certificate_image'],
            'status' => $input['status'],

        ]);

        $user->hobbies->update([
            'hobby'=> $input['hobby'],

        ]);

        $user->jobs->update([
            'company_name'=> $input['company_name'],
            'year_started'=> $input['year_started'],
            'year_ended' => $input['year_ended'],
            'description' => $input['description'],
        ]);

        $user->physicalDisabilities->update([
            'physical_disabilities'=> $input['physical_disabilities'],

        ]);

        $user->placesLiveds->update([
            'places_lived'=> $input['places_lived'],

        ]);

        $user->qualities->update([
            'quality'=> $input['quality'],

        ]);

        $user->educations->update([
            'institute_name'=> $input['institute_name'],
            'year_started'=> $input['year_started'],
            'year_ended' => $input['year_ended'],
            'description' => $input['description'],
            'education_certificate' => $input['education_certificate'],
        ]);


            $user->sendEmailVerificationNotification();
    }
}
