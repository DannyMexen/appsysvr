<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $requisitions_status = DB::select(DB::raw("

        SELECT v.registration AS registration, concat(v.make,' ',v.model) AS make_model, -- Vehicle details
			concat(e.first_name,' ',e.last_name) AS requester, -- Employee details
				concat(fa.first_name,' ',fa.last_name) AS officer, -- First approver details
					concat(m.first_name,' ',m.last_name) AS manager, -- Manager details
						(select d.name
							from departments d
								where e.department_id = d.id) AS department,
							r.purpose AS purpose, -- Purpose
								DATE_FORMAT(r.start_date, '%d %b') AS start_date,
									DATE_FORMAT(r.return_date, '%d %b') AS return_date, -- Usage dates
									p.actor AS pending_action -- Pending action
FROM
	requisitions r

JOIN vehicles v ON r.vehicle_id = v.id
	JOIN employees  e ON r.employee_id = e.id
		JOIN employees fa ON r.officer_id = fa.id
			JOIN employees m ON r.manager_id = m.id
				JOIN pending_actions p ON r.pending_action_id = p.id


        "));



        return view('report.index', compact('requisitions_status'));
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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
