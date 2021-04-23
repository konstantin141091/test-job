<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', [
            'cars' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        if (DB::table('cars')->delete($id)) {
            return response()->json(['status' => 'good']);
        }else {
            return response()->json(['status' => 'error']);
        }
    }

    public function search(Request $request) {
        $value = $request->value;
        $carsResponse = collect([]);
        $cars = Car::all();
        foreach ($cars as $car) {
            switch ($value) {
                case $car->name:
                    $carsResponse->push($car);
                    break;
                case $car->number:
                    $carsResponse->push($car);
                    break;
                case $car->year:
                    $carsResponse->push($car);
                    break;
                case $car->status:
                    $carsResponse->push($car);
                    break;
                case $car->data:
                    $carsResponse->push($car);
                    break;
                case $car->osago:
                    $carsResponse->push($car);
                    break;
                case $car->license:
                    $carsResponse->push($car);
                    break;
                case $car->color:
                    $carsResponse->push($car);
                    break;
                case $car->time_accounting:
                    $carsResponse->push($car);
                    break;
                case $car->mileage:
                    $carsResponse->push($car);
                    break;
                case $car->service:
                    $carsResponse->push($car);
                    break;

            }
        }

        dd($carsResponse);
    }

}
