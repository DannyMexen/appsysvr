<?php

namespace App\Http\Controllers;

use App\Requisition;
use App\Employee;
use App\Department;
use App\Vehicle;
use App\Mail\RequisitionCreated;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Mail;

class RequisitionsController extends Controller
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
                        r.pending_action_id = 1
                ORDER BY
                        r.created_at
                        DESC
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
        if (empty(session('id'))) {
            abort(403);
        }

        $errors = new MessageBag();

        if (empty(session('id'))) {
            $errors->add('session', 'You have to <u><a class="black-text" href="/login">login</a></u> to first.');
            $manager = [];
            $department = [];
        } else {
            $manager = Employee::where('id', '=', session('manager_id'))->firstOrFail();
            $department = Department::where('id', '=', session('department_id'))->firstOrFail();
        }

        // Pending actions
        // $pending_actions =

        // Available vehicles
        $vehicles = Vehicle::all()->where('available', '=', 'Yes');

        // VT Officers
        $officers = DB::select(DB::raw(
            "SELECT
                    e.id, e.first_name, e.last_name, e.employee_number, u.username, u.email, e.position, d.name as department, concat(em.first_name, ' ', em.last_name) AS manager

            FROM
                    employees e, employees em, users u, departments d, managers m

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


        if (request('start_date') == request('return_date')) {

            $requisition->start_date = request()->validate(['start_date' => ['required', 'date']])['start_date'];
            $requisition->return_date = request()->validate(['return_date' => ['required', 'date']])['return_date'];
        } else {

            $requisition->start_date = request()->validate(['start_date' => ['required', 'date', 'before:return_date']])['start_date'];
            $requisition->return_date = request()->validate(['return_date' => ['required', 'date']])['return_date'];
        }

        $requisition->purpose = request()->validate(['purpose' => ['required']])['purpose'];
        $requisition->vehicle_id = (int)request()->validate(['vehicle_id' => ['required']], ['vehicle_id.required' => 'The vehicle is required'])['vehicle_id'];
        $requisition->officer_id = (int)request()->validate(['officer_id' => ['required']], ['officer_id.required' => 'The First Line Approval officer is required'])['officer_id'];



        // Requester's  and manager's IDs
        $requisition->employee_id = session('id');
        $requisition->manager_id = session('manager_id');

        // Pending Action
        $requisition->pending_action_id = 1;

        // Save requisition
        $requisition->save();

        // Send e-mail
        $recipient = User::find($requisition->officer_id)->email;

        Mail::to($recipient)->queue(
            new RequisitionCreated($requisition)
        );

        // Make vehicle unavailable
        DB::table('vehicles')
            ->where('id', $requisition->vehicle_id)
            ->update(['available' => 'No']);


        // Success message
        return redirect()->back()->with('message', 'Success. Please logout if finished.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (empty(session('id'))) {
            abort(403);
        }

        session(['requisition_id' => (int)$id]);

        $requisition = DB::select(DB::raw("

            SELECT
                        v.id AS vehicle_id, v.registration, v.make, v.model,
                        r.id, DATE_FORMAT(r.start_date, '%d %M %Y') AS start_date, DATE_FORMAT(r.return_date, '%d %M %Y') AS return_date, r.purpose,
	                    concat(eo.first_name, ' ', eo.last_name) AS officer, concat(e.first_name, ' ', e.last_name) AS requester, concat(em.first_name, ' ', em.last_name) AS manager,
                        p.actor

            FROM
	                    vehicles v, requisitions r, employees eo, employees e, employees em, pending_actions p

            WHERE
	                    r.vehicle_id = v.id
                        AND
                        r.officer_id = eo.id
                        AND
                        r.employee_id = e.id
                        AND
                        r.manager_id = em.id
                        AND
                        r.pending_action_id = p.id
                        AND
                        r.id = $id
        "))[0];


        session(['vehicle_id' => $requisition->vehicle_id]);

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
