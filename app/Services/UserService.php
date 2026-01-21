<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {}

    public function getAll()
    {
        return $this->userRepository->all();
    }

    public function store(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function find(int $id)
    {
        return $this->userRepository->findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete(int $id): void
    {
        $this->userRepository->delete($id);
    }
}
