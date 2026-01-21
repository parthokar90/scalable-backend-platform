<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::latest()->paginate(10);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function findOrFail(int $id)
    {
        return User::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $user = $this->findOrFail($id);
        $user->update($data);

        return $user;
    }

    public function delete(int $id): void
    {
        $this->findOrFail($id)->delete();
    }
}
