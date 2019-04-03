<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Requisition;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\RequisitionRejectedByManager;


class ManagersRejectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisition = Requisition::find(session('requisition_id'));

        $employee = Employee::find($requisition->employee_id);

        $user = User::find($requisition->employee_id);

        $manager = Employee::find($requisition->manager_id);

        $officer = Employee::find($requisition->officer_id);

        $vehicle = Vehicle::find($requisition->vehicle_id);

        $details = new \ArrayObject([

            'requisition' => $requisition,
            'employee' => $employee,
            'user' => $user,
            'officer' => $officer,
            'vehicle' => $vehicle,
            'manager' => $manager

        ]);


        // Send emails
        $recipient = $user->email;

        Mail::to($recipient)->queue(
            new RequisitionRejectedByManager($details)
        );

        DB::table('requisitions')
            ->where('id', session('requisition_id'))
            ->update(['pending_action_id' => 6]);

        // Make vehicle available
        $vehicle->available = 'Yes';
        $vehicle->save();

        return redirect('/managers-requisitions');
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
    public function destroy($id)
    {
        //
    }
}
