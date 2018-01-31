<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Radar;
use App\Driver;
use App\Repositories\RadarsRepository;

class RadarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   protected $radarRepository;
   
   public function __construct(RadarsRepository $radarRepository)
   {
       $this->radarRepository = $radarRepository;
   }

    public function index()
    {
//        app()->setLocale('lt');
        
        $radars = $this->radarRepository->getAllWithTrashed(8);


        return view('radars.index', compact('radars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = [];

        foreach (Driver::all() as $driver):
            $drivers[$driver->driver_id] = $driver->name;
        endforeach;

        return view('radars.create', compact('drivers'));
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
                'number' => 'max:6',
                'time' => 'required',
                'distance' => 'required',

            ]);

        $validator->validate();

        if ($validator->fails()) {
            return redirect('radars/create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'time' => $request->distance,
            'distance' => $request->time,
        ];

        $this->radarRepository->create($data);

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
        $radar = $this->radarRepository->findById($id);

        $drivers = [];

        foreach (Driver::all() as $driver):
            $drivers[$driver->driver_id] = $driver->name;
        endforeach;
       
        return view('radars.edit', compact('radar', 'drivers'));
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
                'number' => 'max:6',
                'time' => 'required',
                'distance' => 'required',

            ]);

        $validator->validate();

        if ($validator->fails()) {
            return redirect('radars/create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'time' => $request->distance,
            'distance' => $request->time,
            'driver_id' => $request->driver_id,
        ];

        $this->radarRepository->update($id, $data);

        return redirect()->route('radars.index', compact('radar', 'drivers'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->radarRepository->delete($id);

        return redirect()->route('radars.index');
    }

    public function restore($id)
    {
        
        $this->radarRepository->restore($id);

        return redirect()->route('radars.index');

    }
}
