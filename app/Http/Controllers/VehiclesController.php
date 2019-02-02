<?php

namespace App\Http\Controllers;

use App\Vehicle;

use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();

            // return $vehicles;

        return view('vehicles.index', compact('vehicles'));
    }
}
