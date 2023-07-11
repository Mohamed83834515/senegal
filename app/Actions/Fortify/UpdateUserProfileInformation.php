<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rule;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\Auth;
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
        // dd($input);
        Validator::make($input, [
            'user_type_id' => ['required', 'numeric','between:1,2'],
            'nom' => [
                Rule::requiredIf($input['user_type_id'] == 1),
                'string',
                'max:255'
            ],
            'prenom' => [
                Rule::requiredIf($input['user_type_id'] == 1),
                'string',
                'max:255'
            ],
            'raison_social' => [
                Rule::requiredIf($input['user_type_id'] == 2),
                'string',
                'max:255'
            ],
            'fonction' => [
                Rule::requiredIf($input['user_type_id'] == 1),
                'string',
                'max:255'
            ],
            'telephone' => ['required', 'string', 'max:255'],
            'description' => ['nullable','string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'cv' => 'mimes:pdf|max:10240',
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'user_type_id' => $input['user_type_id'],
                'nom' => $input['user_type_id'] == 1 ? $input['nom'] : null,
                'prenom' => $input['user_type_id'] == 1 ?  $input['prenom'] : null,
                'raison_social' => $input['user_type_id'] == 2 ? $input['raison_social'] : null,
                'fonction' => $input['user_type_id'] == 1 ? $input['fonction'] : null,
                'telephone' => $input['telephone'],
                'description' => $input['description'],
                'email' => $input['email'],
                'photo' => isset($input['photo']) ? $this->uploadUserImage($user, $input['photo']) : $user->photo,
                'cv' => isset($input['cv']) ? $this->uploadUserCv($user, $input['cv']) : $user->cv,
            ])->save();
        }

        Flashy::success("Modification effectuée avec succès");
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
            'user_type_id' => $input['user_type_id'],
            'nom' => $input['user_type_id'] == 1 ? $input['nom'] : null,
            'prenom' => $input['user_type_id'] == 1 ?  $input['prenom'] : null,
            'raison_social' => $input['user_type_id'] == 2 ? $input['raison_social'] : null,
            'fonction' => $input['user_type_id'] == 1 ? $input['fonction'] : null,
            'telephone' => $input['telephone'],
            'description' => $input['description'],
            'email' => $input['email'],
            'photo' => $this->uploadUserImage($user, $input['photo']),
            'cv' => $this->uploadUserCv($user, $input['cv']),
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }

    /**
     * Upload user image
     *
     * @param file image
     * @return string image file name
     */
    protected function uploadUserImage($user, $imageFile){
        if ($imageFile == null) {
            return null;
        } else {
            $imageName = 'photo_'.$user->id.'_'.uniqid().'.'.$imageFile->extension();
            $imageFile->move(public_path('upload/user_image'), $imageName);

            return $imageName;
        }
    }

    /**
     * Upload user curriculum vitae
     *
     * @param file pdf
     * @return string cv file name
     */
    protected function uploadUserCv($user, $pdfFile){
        if ($pdfFile == null) {
            return null;
        } else {
            $cvName = 'cv_'.$user->id.'_'.uniqid().'.'.$pdfFile->extension();
            $pdfFile->move(public_path('upload/curriculum_vitae'), $cvName);

            return $cvName;
        }
    }
}
