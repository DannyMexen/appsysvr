<?php

namespace App\Http\Controllers;

use App\Manager;
use App\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Department;

class ManagersController extends Controller
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

        $managers = DB::select(DB::raw(
            "SELECT e.id, e.first_name, e.last_name, e.employee_number, u.username, u.email, d.name as department
        
        FROM employees e, users u, departments d, managers m

        WHERE
            e.position LIKE '%manager%' 
            AND
            e.id = m.employee_id
            AND
            e.user_id = u.id
            AND
            e.department_id = d.id

        -- GROUP BY e.employee_number"
        ));
        return view('managers.index', compact('managers'));
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
        $departments = Department::all();
        return view('managers.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $employee = new Employee();
        $user = new User();
        $manager = new Manager();

        // Employee number, first name and last name
        $employee->employee_number = request()->validate(['employee_number' => ['required', 'size:6', 'regex:~EN\d{4}~', 'unique:employees,employee_number']])['employee_number'];
        $employee->first_name = request()->validate(['first_name' => ['required', 'regex:~^[^0-9]+$~', 'min:3', 'max:255']])['first_name'];
        $employee->last_name = request()->validate(['last_name' => ['required', 'regex:~^[^0-9]+$~', 'min:3', 'max:255']])['last_name'];


        // Save username and email first
        $user->username = request()->validate(['username' => ['required', 'min:5', 'max:255', 'unique:users,username']])['username'];
        $user->email = request()->validate(['email' => ['required', 'email', 'unique:users,email']])['email'];


        $user->email_verified_at = now()->toArray()['formatted'];
        $user->password = Hash::make('Welcome@123');
        $user->remember_token = str_random(10);

        $user->save();

        // Get user_id of the above record
        $employee->user_id = User::all()->last()->id;


        // Department details
        $employee->position = 'Manager';
        $employee->department_id = request()->validate(['department_id' => 'required', ], ['department_id.required' => 'The department is required'])['department_id'];
        $employee->manager_id = 1;

        // Save all employee details
        $employee->save();

        // Add to managers table
        $manager->employee_id = Employee::all()->last()->id;
        $manager->save();

        // Update new manager for all staff in that department
        DB::table('employees')->where([
            ['department_id', $employee->department_id],
            ['position', 'NOT LIKE', '%manager%']
        ])->update(['manager_id' => $manager->employee_id]);

        /*
        $department_staff = DB::table('employees')->where([
            ['department_id', $employee->department_id],
            ['position', 'NOT LIKE', '%manager%']
        ])->get();
        */



        // Update requisitions table for all pending items

        return redirect('/managers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (empty(session('id'))) {
            abort(403);
        }
        $manager = DB::select(DB::raw(
            "SELECT e.id, e.first_name, e.last_name, e.employee_number, e.position, u.username, u.email, d.name as department
        
        FROM employees e, users u, departments d, managers m

        WHERE
            e.id = $id
            AND
            e.position LIKE '%manager%' 
            AND
            e.id = m.employee_id
            AND
            e.user_id = u.id
            AND
            e.department_id = d.id

        GROUP BY e.employee_number"
        ))[0];
        return view('managers.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $employee = Employee::find($id);
        $user = User::find($employee->user_id);

        // Employee number, first name and last name
        if ($employee->employee_number == request('employee_number')) {

            $employee->employee_number = request()->validate(['employee_number' => ['required', 'size:6', 'regex:~EN\d{4}~']])['employee_number'];
        } else {
            $employee->employee_number = request()->validate(['employee_number' => ['required', 'size:6', 'regex:~EN\d{4}~', 'unique:employees,employee_number']])['employee_number'];
        }

        $employee->first_name = request()->validate(['first_name' => ['required', 'regex:~^[^0-9]+$~', 'min:3', 'max:255']])['first_name'];
        $employee->last_name = request()->validate(['last_name' => ['required', 'regex:~^[^0-9]+$~', 'min:3', 'max:255']])['last_name'];

        // username and email first
        if ($user->username == request('username')) {
            $user->username = request()->validate(['username' => ['required', 'min:5', 'max:255']])['username'];
        } else {

            $user->username = request()->validate(['username' => ['required', 'min:5', 'max:255', 'unique:users,username']])['username'];
        }

        if ($user->email == request('email')) {
            $user->email = request()->validate(['email' => ['required', 'min:5', 'max:255']])['email'];
        } else {

            $user->email = request()->validate(['email' => ['required', 'min:5', 'max:255', 'unique:users,email']])['email'];
        }

        // Save  manager details
        $user->save();
        $employee->save();

        return redirect('/managers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $employee = Employee::findOrFail($id);
        $user = User::findOrFail($employee->user_id);
        $manager = Manager::where('employee_id', '=', $employee->id)->firstOrFail();

        $employee->delete();
        $manager->delete();
        $user->delete();

        return redirect('/managers');
    }
}
