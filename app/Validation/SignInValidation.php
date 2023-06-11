<?php

namespace App\Validation;

use Illuminate\Support\Facades\Validator;

class SignInValidation
{
    public function createValidator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users',
        ]);

        return $validator;
    }

    public function updateValidator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'string',
            'surname' => 'string',
            'email' => 'email|unique:users,email,' . $data['id'],
        ]);
        return $validator;
    }
}

