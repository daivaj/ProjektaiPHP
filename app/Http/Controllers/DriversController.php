<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Driver;

use App\Radar;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::withTrashed()->orderby('name', 'desc')->paginate(5);
//        $drivers = Driver::
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'city' => 'required',

            ]);

        $validator->validate();

        if ($validator->fails()) {
            return redirect('drivers/create')
                ->withErrors($validator)
                ->withInput();
        }


        $data = [
            'name' => $request->name,
            'city' => $request->city,
        ];
        Driver::create($data);

        return redirect()->route('drivers.index');
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
        Driver::where('driver_id', $id)->first();

        return view('drivers.edit', compact('driver'));
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

        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'city' => 'required',

            ]);

        $validator->validate();

        if ($validator->fails()) {
            return redirect('drivers/create')
                ->withErrors($validator)
                ->withInput();
        }

        $driver = Driver::where('driver_id', $id)->first();

        $data = [
            'name' => $request->name,
            'city' => $request->city,
        ];

             $driver->update($data);

        return redirect()->route('drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Driver::where('driver_id', $id)->delete();

        return redirect()->route('drivers.index');
    }

    public function restore($id)
    {
        Driver::onlyTrashed()->where('driver_id', $id)->restore();
     
        return redirect()->route('drivers.index');

    }

}
