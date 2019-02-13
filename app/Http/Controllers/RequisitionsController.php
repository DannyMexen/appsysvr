<?php

namespace App\Http\Controllers;

use App\Requisition;
use App\Employee;
use App\Vehicle;
use App\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class RequisitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisition::all();

        return view('requisitions.index', compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Available vehicles
        $vehicles = Vehicle::all()->where('available', '=', 'Yes');

        // VT Officers
        $officers = DB::select(DB::raw(
             "SELECT e.id, e.first_name, e.last_name, e.employee_number, u.username, u.email, e.position, d.name as department, concat(em.first_name, ' ', em.last_name) AS manager
            
            FROM employees e, employees em, users u, departments d, managers m

            WHERE
                e.department_id = 7
                AND
                e.position = 'VT Officer'
                AND
                em.id = m.employee_id AND e.manager_id = m.employee_id
                AND
                e.user_id = u.id
                AND
                e.department_id = d.id

            GROUP BY e.employee_number"
    )); 

        return view('requisitions.create', compact('vehicles', 'officers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return request()->all();

        $requisition = new Requisition();

        $requisition->vehicle_id = request('vehicle_id');
        $requisition->start_date = request('start_date');
        $requisition->return_date = request('return_date');
        $requisition->purpose = request('purpose');
        $requisition->officer_id = request('officer_id');
        $manager_department = request('manager_department');


        // Separate manager and department details
        $manager_department_details = explode(' - ', $manager_department);
        $manager = $manager_department_details[0];
        $department = $manager_department_details[1];

        // Department ID
        $department_id = DB::table('departments')->select('id')
                                                                ->where('name', '=', $department)
                                                                ->get()[0]->id;

        // Manager ID
        $requisition->manager_id = DB::table('employees')->select('id')
                                                        ->where([
                                                            ['department_id','=',$department_id],
                                                            ['position', '=','Manager']
                                                        ])->get()[0]->id;
        // Pending Action
        $requisition->pending_action = 'Officer';


        // Save requisition
        $requisition->save();

        // Make vehicle unavailable
        DB::table('vehicles')
                ->where('id', $requisition->vehicle_id)
                ->update(['available' => 'No']);


        return redirect('/requisitions');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $requisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $requisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisition $requisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        //
    }
}
