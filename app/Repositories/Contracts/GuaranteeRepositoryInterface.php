<?php

namespace App\Repositories\Contracts;

interface GuaranteeRepositoryInterface
{
    public function create(array $data);
    public function getAll();
    public function findById(int $id);
    public function update(int $id, array $data);
    public function delete(int $id);
}
