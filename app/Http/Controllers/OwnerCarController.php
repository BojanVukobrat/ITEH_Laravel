<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarCollection;
use App\Models\Car;
use Illuminate\Http\Request;

class OwnerCarController extends Controller
{
    public function index($ownerID)
    {
        $cars = Car::get()->where('owner_id', $ownerID);
        if(is_null($cars)) {
            return response()->json('Data not found', 404);
        }
        return new CarCollection($cars);
    }
}
