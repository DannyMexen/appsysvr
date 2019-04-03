<?php

namespace App\Http\Controllers;

use App\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class OfficersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $officers = DB::select(DB::raw(
             "SELECT e.first_name, e.last_name, e.employee_number, u.username, u.email, e.position, d.name as department, concat(em.first_name, ' ', em.last_name) AS manager
            
            FROM employees e, employees em, users u, departments d, managers m

            WHERE
                e.position = 'VT Officer'
                AND
                em.id = m.employee_id AND e.manager_id = m.employee_id
                AND
                e.user_id = u.id
                AND
                e.department_id = d.id

            GROUP BY e.employee_number"
    ));
     
        return view('officers.index', compact('officers'));
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
     * @param  \App\VehicleOfficer  $vehicleOfficer
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleOfficer $vehicleOfficer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleOfficer  $vehicleOfficer
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleOfficer $vehicleOfficer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleOfficer  $vehicleOfficer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleOfficer $vehicleOfficer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleOfficer  $vehicleOfficer
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleOfficer $vehicleOfficer)
    {
        //
    }
}
