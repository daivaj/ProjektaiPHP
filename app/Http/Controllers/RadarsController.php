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
   
   public function __construct(RadarsRepository $radarsRepository)
   {
       $this->radarRepository = $radarsRepository;
   }

    public function index()
    {
        app()->setLocale('lt');
        
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
        $radar = $this->radarRepository->find($id);

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

        $this->radarRepository->find($id)->update($data);

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

        $this->radarRepository->find($id)->delete();

        return redirect()->route('radars.index');
    }

    public function restore($id)
    {
        
        $this->radarRepository->onlyTrashed()->find($id)->restore();

        return redirect()->route('radars.index');

    }
}
