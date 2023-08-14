<?php

namespace App\Actions\Fortify;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'mobile' => ['required', 'string', 'max:255', 'unique:users', 'min: 8',],
            'password' => $this->passwordRules(),
        ])->validate();

        $username = str_replace([' ', '.'], '_', $input['username']);


        $user = User::create([
            'username' => $username,
            'name' => $input['name'],
            'email' => $input['email'],
            'mobile' => $input['mobile'],
            'password' => Hash::make($input['password']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->assignRole('user');

        Profile::create([
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $user;
    }
}
