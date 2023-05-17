<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarCollection;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    //GET
    //localhost:8000/api/cars
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return CarResource::collection(Car::all());
        return new CarCollection(Car::all());
    }

    //GET
    //localhost:8000/api/cars/{carID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $carID
     * @return \Illuminate\Http\Response
     */
    public function show($carID)
    {
        $car = Car::find($carID);
        return is_null($car) ? response()->json('Data not found', 404) : new CarResource($car);
    }


    //DELETE
    //localhost:8000/api/cars/{carID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $carID
     * @return \Illuminate\Http\Response
     */
    public function destroy($carID)
    {
        $car = Car::where('id', $carID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Car deleted successfully.",
            "data" => $car
        ]);
    }
}
