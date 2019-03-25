<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Approval;
use Illuminate\Http\Request;
use App\Requisition;
use App\Employee;
use Illuminate\Foundation\Auth\User;
use App\Mail\RequisitionRequest;
use Illuminate\Support\Facades\Mail;
use App\Vehicle;

class ApprovalsController extends Controller
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
        $recipient = User::find($requisition->manager_id)->email;

        Mail::to($recipient)->queue(
            new RequisitionRequest($details)
        );


        DB::table('requisitions')
            ->where('id', session('requisition_id'))
            ->update(['pending_action_id' => 2]);


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
     * @param  \App\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function show(Approval $approval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function edit(Approval $approval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approval $approval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Approval  $approval
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approval $approval)
    {
        //
    }
}
