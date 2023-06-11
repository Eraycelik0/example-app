<?php

namespace App\Repositories;

use App\Models\SignIn;

class SignInRepository implements SignInInterface
{
    public function create(array $data): SignIn
    {
        return SignIn::create($data);
    }

    public function update(SignIn $signIn, array $data): SignIn
    {
        $signIn->update($data);
        return $signIn;
    }

    public function delete(SignIn $signIn): bool
    {
        return $signIn->delete();
    }


    public function getById($id): ?SignIn
    {
        return SignIn::find($id);
    }


    public function getAll()
    {
        return SignIn::get();
    }
}

