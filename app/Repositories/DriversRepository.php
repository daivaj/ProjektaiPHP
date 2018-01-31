<?php

namespace App\Repositories;

use App\Driver;

class DriversRepository
{

    protected $entity;

    public function __construct(Driver $entity)
    {
        $this->entity = $entity;
    }

    public function getAllWithTrashed(int $pageSize)
    {
        return $this->entity
            ->withTrashed()
            ->orderby('name', 'desc')
            ->paginate($pageSize);
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

    public function findById(int $id)
    {
        return $this->entity->find($id)->first();
    }

    public function update(int $id, array $data)
    {
        $radar = $this->findById($id);

        return $radar->update($data);

    }

    public function delete(int $id)
    {

        return $this->entity->find($id)->delete();

    }

    public function restore(int $id)
    {

        return $this->entity->onlyTrashed()->find($id)->restore();

    }
}