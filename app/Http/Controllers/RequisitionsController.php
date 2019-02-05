<?php

namespace App\Http\Controllers;

use App\Requisition;

use App\Vehicle;

use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class RequisitionsController extends Controller
{
    //
    public function create()
    {
        // vehicle list
        $vehicles = Vehicle::all();
        return view('requisitions.create', compact('vehicles'));
    }
}