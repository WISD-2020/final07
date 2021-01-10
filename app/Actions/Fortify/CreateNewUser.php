<?php

namespace App\Actions\Fortify;

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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:2'],
            'birthday' => ['required', 'date'],
            'idnum' => ['required', 'string', 'max:10'],
            'type' => ['required', 'string', 'max:1'],
            'tel' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'sex' => $input['sex'],
            'birthday' => $input['birthday'],
            'idnum' => $input['idnum'],
            'type' => $input['type'],
            'tel' => $input['tel'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
