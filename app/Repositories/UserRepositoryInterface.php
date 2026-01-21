<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function findOrFail(int $id);
    public function update(int $id, array $data);
    public function delete(int $id): void;
}
