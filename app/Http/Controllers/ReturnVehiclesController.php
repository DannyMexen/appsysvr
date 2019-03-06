<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requisition;
use Illuminate\Support\Facades\DB;
use App\Vehicle;

class ReturnVehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (empty(session('id'))) {
            abort(403);
        }


        $employee_id = session('id');

        $requisitions = DB::select(DB::raw(
            "
                SELECT 
                        v.registration, v.make, v.model, 
                        DATE_FORMAT(r.start_date, '%d %M %Y') AS start_date,DATE_FORMAT(r.return_date, '%d %M %Y') AS return_date, r.id, r.purpose, 
                        e.employee_number,
                        concat(e.first_name, ' ', e.last_name) as employee_name,
                        u.email,
                        concat(em.first_name, ' ', em.last_name) as manager
                FROM 
                        vehicles v, requisitions r, employees e, employees em, users u
                WHERE 
                        v.id = r.vehicle_id
                        AND 
                        em.id = r.manager_id 
                        AND 
                        e.id = r.employee_id 
                        AND
                        u.id = e.user_id
                        AND
                        v.available = 'No'
                        AND
                        r.pending_action_id = 3
                        AND
                        r.employee_id = $employee_id
                ORDER BY
                        r.created_at
            "
        ));


        return view('returnvehicles.index', compact('requisitions'));
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
        $requisition = Requisition::findOrFail($id);
        $vehicle = Vehicle::findOrFail($requisition->vehicle_id);

        $requisition->pending_action_id = 4;
        $vehicle->available = 'Yes';

        $requisition->save();
        $vehicle->save();

        // Send e-mail

        return back();
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
    public function destroy($id)
    {
        //
    }
}
