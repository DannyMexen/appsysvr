<?php

namespace App\Http\Controllers;

use App\Rejection;
use Illuminate\Http\Request;

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
DB::table('requisitions')
            ->where('id', session('requisition_id'))
            ->update(['pending_action_id' => 5]);

            // Send emails

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
