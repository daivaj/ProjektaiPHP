<?php

namespace App\Repositories;

use App\Radar;

class RadarsRepository
{

    protected $entity;

    public function __construct(Radar $entity)
    {
        $this->entity = $entity;
    }

    public function getAllWithTrashed(int $pageSize)
    {
        return $this->entity
            ->withTrashed()
            ->orderby('number', 'desc')
            ->paginate($pageSize);
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

    public function findById(int $id)
    {
        return $this->entity->find($id);
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