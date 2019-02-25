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
        $employee->employee_number = request('employee_number');
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');

        // Save username and email first
        $user->username = request('username');
        $user->email = request('email');
        $user->email_verified_at = now();
        $user->password = Hash::make('Welcome@123');
        $user->remember_token = str_random(10);
        $user->save();

        // Get user_id of the above record
        $employee->user_id = User::all()->last()->id;


        // Department details
        $employee->position = 'Manager';
        $employee->department_id = request('department_id');
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
        ])
            ->update(['manager_id' => $manager->employee_id]);

        $department_staff = DB::table('employees')->where([
            ['department_id', $employee->department_id],
            ['position', 'NOT LIKE', '%manager%']
        ])->get();

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
        // dd(request()->all());

        $employee = Employee::find($id);
        $user = User::find($employee->user_id);

        $employee->employee_number = request('employee_number');
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $user->username = request('username');
        $user->email = request('email');

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
