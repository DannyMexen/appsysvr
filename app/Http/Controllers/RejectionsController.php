<?php

namespace App\Http\Controllers;

use App\Rejection;
use App\Vehicle;
use App\Requisition;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Foundation\Auth\User;
use App\Mail\RequisitionRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class RejectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        /* DB::table('requisitions')
            ->where('id', session('requisition_id'))
            ->update(['pending_action_id' => 5]);

 DB::table('vehicles')
            ->where('id', session('vehicle_id'))
            ->update(['available' => 'Yes']); */

        $requisition = Requisition::find(session('requisition_id'));

        $employee = Employee::find($requisition->employee_id);

        $user = User::find($requisition->employee_id);

        $officer = Employee::find($requisition->officer_id);

        $vehicle = Vehicle::find($requisition->vehicle_id);

        $details = new \ArrayObject([

            'requisition' => $requisition,
            'employee' => $employee,
            'user' => $user,
            'officer' => $officer,
            'vehicle' => $vehicle

        ]);


        // Send emails
        $employee_address = $user->email;
        $manager_address = User::find($requisition->manager_id)->email;

        Mail::to($employee_address)->cc($manager_address)->queue(
            new RequisitionRequest($details)
        );


        DB::table('requisitions')
            ->where('id', session('requisition_id'))
            ->update(['pending_action_id' => 5]);


        // Make vehicle available
        $vehicle->available = 'Yes';


        return redirect('/requisitions');
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
     * @param  \App\Rejection  $rejection
     * @return \Illuminate\Http\Response
     */
    public function show(Rejection $rejection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rejection  $rejection
     * @return \Illuminate\Http\Response
     */
    public function edit(Rejection $rejection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rejection  $rejection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rejection $rejection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rejection  $rejection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rejection $rejection)
    {
        //
    }
}
