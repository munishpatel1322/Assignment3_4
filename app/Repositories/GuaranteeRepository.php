<?php
namespace App\Repositories;

use App\Models\Guarantee;
use App\Repositories\Contracts\GuaranteeRepositoryInterface;

class GuaranteeRepository implements GuaranteeRepositoryInterface
{
    public function create(array $data)
    {
        return Guarantee::create($data);
    }
    public function getAll()
    {
        return Guarantee::all();
    }

    public function findById(int $id)
    {
        return Guarantee::find($id);
    }

    public function update(int $id, array $data)
    {
        $guarantee = Guarantee::find($id);
        if ($guarantee) {
            $guarantee->update($data);
            return $guarantee;
        }
        return null;
    }

    public function delete(int $id)
    {
        return Guarantee::destroy($id);
    }
}
