<?php

namespace App\Http\Controllers;

use App\Requisition;
use App\Employee;
use App\Department;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class RequisitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
                        AND r.manager_id = em.id
                        AND r.employee_id = e.id
                        AND u.id = e.user_id
                        AND v.available = 'No'
                ORDER BY
                        r.created_at
            "
        ));


        return view('requisitions.index', compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $errors = new MessageBag();

        if (empty(session('id'))) {
            $errors->add('session', 'You have to <u><a class="black-text" href="/login">login</a></u> to first.');
            $manager = [];
            $department = [];
        } else {
            $manager = Employee::where('id', '=', session('manager_id'))->firstOrFail();
            $department = Department::where('id', '=', session('department_id'))->firstOrFail();
        }

        // return ([session()->all(),$manager,$department]);

        // Available vehicles
        $vehicles = Vehicle::all()->where('available', '=', 'Yes');

        // VT Officers
        $officers = DB::select(DB::raw(
            "SELECT 
                    e.id, e.first_name, e.last_name, e.employee_number, u.username, u.email, e.position, d.name as department, concat(em.first_name, ' ', em.last_name) AS manager
            
            FROM 
                    employees e, employees em, users u, departments d, managers m

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

        return view('requisitions.create', compact('vehicles', 'officers', 'manager', 'department'))->withErrors($errors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $requisition = new Requisition();

        $requisition->start_date = request()->validate(['start_date' => ['required', 'date','before:end_date']])['start_date'];
        $requisition->return_date = request()->validate(['return_date' => ['required', 'date','after:start_date']])['return_date'];
        $requisition->purpose = request()->validate(['purpose' => ['required']])['purpose'];
        $requisition->vehicle_id = request()->validate(['vehicle_id' => ['required']],['vehicle_id.required' => 'The vehicle is required'])['vehicle_id'];
        $requisition->officer_id = request()->validate(['officer_id' => ['required']],['officer_id.required' => 'The First Line Approval officer is required'])['officer_id'];

        $manager_department = request()->validate(['manager_department' => ['required']])['manager_department'];



        // Separate manager and department details
        $manager_department_details = explode(' - ', $manager_department);


        $manager = $manager_department_details[0];
        $department = $manager_department_details[1];

        // Department ID
        $department_id = DB::table('departments')->select('id')
            ->where('name', '=', $department)
            ->get()[0]->id;


        // Requester's ID
        $requisition->employee_id = 18;
        // Manager ID
        $requisition->manager_id = DB::table('employees')->select('id')
            ->where([
                ['department_id', '=', $department_id],
                ['position', '=', 'Manager']
            ])->get()[0]->id;
        // Pending Action
        $requisition->pending_action = 'Officer';



        return $requisition;
        // Save requisition
        // $requisition->save();

        // Make vehicle unavailable
        DB::table('vehicles')
            ->where('id', $requisition->vehicle_id)
            ->update(['available' => 'No']);

        // Send e-mail

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisition = DB::select(DB::raw("

            SELECT 
                        v.registration, v.make, v.model,
                        r.id, DATE_FORMAT(r.start_date, '%d %M %Y') AS start_date, DATE_FORMAT(r.return_date, '%d %M %Y') AS return_date, r.purpose, 
	                    concat(eo.first_name, ' ', eo.last_name) AS officer, concat(e.first_name, ' ', e.last_name) AS requester, concat(em.first_name, ' ', em.last_name) AS manager,
                        r.pending_action

            FROM
	                    vehicles v, requisitions r, employees eo, employees e, employees em

            WHERE
	                    r.vehicle_id = v.id
                        AND
                        r.officer_id = eo.id
                        AND
                        r.employee_id = e.id
                        AND
                        r.manager_id = em.id
                        AND
                        r.id = $id
        "))[0];

        return view('requisitions.show', compact('requisition'));
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
