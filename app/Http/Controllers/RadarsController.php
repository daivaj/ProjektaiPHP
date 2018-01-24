<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Radar;

class RadarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $radars = Radar::orderby('number', 'desc')->paginate(5);

        return view('radars.index', compact('radars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'time' => $request->distance,
            'distance' => $request->time,
        ];
        Radar::create($data);

        return redirect()->route('radars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $radar = Radar::find($id);

        return view('radars.edit', compact('radar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $radar = Radar::find($id);

        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'time' => $request->distance,
            'distance' => $request->time,
        ];

        $radar->update($data);

        return redirect()->route('radars.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Radar::find($id)->delete();

        return redirect()->route('radars.index');
    }

    public function restore($id)
    {
        Radar::onlyTrashed()->find($id)->restore();

        return redirect()->route('radars.index');

    }
}
