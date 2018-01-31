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

    public function create()
    {
        return $this->entity->create($data);
    }

    public function store(Request $request)
    {

        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'time' => $request->distance,
            'distance' => $request->time,
        ];

        $this->entity->create($data);

        return redirect()->route('radars.index');
    }

    public function edit($id)
    {
        $this->entity->find($id);

        return view('radars.edit', compact('radar'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'time' => $request->distance,
            'distance' => $request->time,
        ];

        $this->entity->find($id)->update($data);

        return redirect()->route('radars.index');

    }

    public function destroy($id)
    {

        $this->entity->find($id)->delete();

        return redirect()->route('radars.index');
    }

    public function restore($id)
    {

        $this->entity->onlyTrashed()->find($id)->restore();

        return redirect()->route('radars.index');

    }
}