<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use MercurySeries\Flashy\Flashy;
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
        Validator::make($input, [
            'user_type_id' => ['required', 'numeric'],
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
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $input['password'] = Hash::make($input['password']);

        Flashy::success("Compte créé avec success");

        return User::create($input);
    }
}
