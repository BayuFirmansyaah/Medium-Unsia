<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserService
{
    public function validateUser(array $data)
    {
        $validator = Validator::make($data, User::rules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function findUserById($id)
    {
        return User::find($id);
    }

    public function createUser(array $data)
    {
        $validatedData = $this->validateUser($data);
        return User::create($validatedData);
    }

    public function updateUser($id, array $data)
    {
        $validatedData = $this->validateUser($data);
        $user = User::find($id);
        if ($user) {
            $user->update($validatedData);
            return $user;
        }
        return null;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        }
        return null;
    }
}
