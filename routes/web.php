<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('about', function () {
//    $number = 'kkk111';
//    $speed = 120;
//
//    return view('about', compact('date', 'number', 'speed'));
//});
//
//Route::get('about', function () {
//    $date = [
//        [
//            'number' => 'jjj111', 'speed' => 120
//        ],
//        [
//            'number' => 'jjj111', 'speed' => 130
//        ],
//        [
//            'number' => 'jjj111', 'speed' => 140
//        ],
//    ];
//
//    return view('about', compact('radars'));
//});
//
//Route::get('radars', function () {
////    $radars = DB::table('radars')->get();
//    $radars = \App\Radar::all();
//
//    return view('radars', compact('radars'));
//});
//
//Route::get('radars/{id}', function ($id) {
////    $radars = DB::table('radars')->find($id);
//    $radar = \App\Radar::find($id);
//    return view('radar', compact('radar'));
//});
////
//Route::get('radars/{id}', function ($id) {
////    $radars = DB::table('radars')->find($id);
////    $radars = \App\Radar::where('number', $number)->first();
//
//    return view('radars', compact('radars'));
//});

//Route::get('drivers', function () {
//    $drivers = \App\Driver::all();
//
//    return view('drivers', compact('drivers'));
//});
//
//Route::get('drivers/{id}', function ($id) {
//    $driver = \App\Driver::where('driver_id', $id)->first();
//
//    return view('driver', compact('driver'));
//});
//
//Route::get('fuel_stations', function () {
//    $fuel_stations = \App\FuelStation::all();
//
//    return view('fuel_stations', compact('fuel_stations'));
//});
//
//Route::get('fuel_stations/{id}', function ($id) {
//    $fuel_station = \App\Driver::where('station_id', $id)->first();
//
//    return view('fuel_station', compact('fuel_station'));
//});



Route::get('radars', 'RadarsController@index')->name('radars.index');
Route::get('radars/create', 'RadarsController@create')->name('radars.create');
Route::post('radars', 'RadarsController@store')->name('radars.store');
Route::get('radars/{radars}', 'RadarsController@show')->name('radars.show');
Route::get('radars/{radars}/edit', 'RadarsController@edit')->name('radars.edit');
Route::put('radars/{radars}', 'RadarsController@update')->name('radars.update');
Route::delete('radars/{radars}/delete', 'RadarsController@destroy')->name('radars.destroy');
Route::post('radars/{radars}/restore', 'RadarsController@restore')->name('radars.restore');

Route::get('drivers', 'DriversController@index')->name('drivers.index');
Route::get('drivers/create', 'DriversController@create')->name('drivers.create');
Route::post('drivers', 'DriversController@store')->name('drivers.store');
Route::get('drivers/{drivers}', 'DriversController@show')->name('drivers.show');
Route::get('drivers/{drivers}/edit', 'DriversController@edit')->name('drivers.edit');
Route::post('drivers/{drivers}', 'DriversController@update')->name('drivers.update');
Route::delete('drivers/{drivers}', 'DriversController@destroy')->name('drivers.destroy');
Route::post('drivers/{drivers}', 'DriversController@restore')->name('drivers.restore');

//Route::resource('radars', 'RadarsController');
//
//Route::resource('radars', 'RadarsController', ['only' => [
//    'index', 'show'
//]]);
//
//Route::resource('radars', 'RadarsController', ['except' => [
//    'create', 'store', 'update', 'destroy'
//]]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){

    Route::get('radars', 'RadarsController@index')->name('radars.index');
    Route::get('radars/create', 'RadarsController@create')->name('radars.create');
    Route::post('radars', 'RadarsController@store')->name('radars.store');
    Route::get('radars/{radars}', 'RadarsController@show')->name('radars.show');
    Route::get('radars/{radars}/edit', 'RadarsController@edit')->name('radars.edit');
    Route::put('radars/{radars}', 'RadarsController@update')->name('radars.update');
    Route::delete('radars/{radars}/delete', 'RadarsController@destroy')->name('radars.destroy');
    Route::post('radars/{radars}/restore', 'RadarsController@restore')->name('radars.restore');

    Route::get('drivers', 'DriversController@index')->name('drivers.index');
    Route::get('drivers/create', 'DriversController@create')->name('drivers.create');
    Route::post('drivers', 'DriversController@store')->name('drivers.store');
    Route::get('drivers/{drivers}', 'DriversController@show')->name('drivers.show');
    Route::get('drivers/{drivers}/edit', 'DriversController@edit')->name('drivers.edit');
    Route::post('drivers/{drivers}', 'DriversController@update')->name('drivers.update');
    Route::delete('drivers/{drivers}', 'DriversController@destroy')->name('drivers.destroy');
    Route::post('drivers/{drivers}', 'DriversController@restore')->name('drivers.restore');

});
