<?php

namespace App\Http\Controllers;

use App\Vehicle;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class VehiclesController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();

            // return $vehicles;

        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');

    }

    public function store()
    {
        $vehicle = new Vehicle();

        $vehicle->registration = request('registration');
        $vehicle->make = request('make');
        $vehicle->model = request('model');
        $vehicle->available = request('available');

        $vehicle->save();

        // return request()->all();

        return redirect('/vehicles');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::find($id);

        // return ($vehicle);

        return view('vehicles.edit', compact('vehicle'));

    }

    public function update($id)
    {
        $vehicle = Vehicle::find($id);

        $vehicle->registration = request('registration');
        $vehicle->make= request('make');
        $vehicle->model = request('model');

        $vehicle->save();

        return redirect('/vehicles');

    }
}
