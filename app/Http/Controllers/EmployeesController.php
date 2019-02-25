<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::select(DB::raw(
            "SELECT e.id, e.first_name, e.last_name, e.employee_number, u.username, u.email, e.position, d.name as department, concat(em.first_name, ' ', em.last_name) AS manager
            
            FROM employees e, employees em, users u, departments d, managers m

            WHERE
                em.id = m.employee_id AND e.manager_id = m.employee_id
                AND
                e.user_id = u.id
                AND
                e.department_id = d.id
                AND
                e.position NOT LIKE '%Manager%'

            GROUP BY e.employee_number
            ORDER BY d.name
            "
        ));

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return request()->all();

        $employee = new Employee();
        $user = new User();

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
        $employee->position = request('position');
        $employee->department_id = request('department_id');

        $employee->manager_id = DB::table('employees')
            ->select('id')
            ->where([
                ['department_id', '=', $employee->department_id],
                ['position', '=', 'Manager'],
            ])->get()[0]->id;


        // Save all employee details
        $employee->save();

        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();

        $employee = DB::select(DB::raw("
            SELECT 
                    e.id, e.first_name, e.last_name, e.employee_number, u.username, u.email, e.position, d.name as department, concat(em.first_name, ' ', em.last_name) AS manager
            
            FROM
                    employees e, employees em, users u, departments d, managers m

            WHERE
                    e.id = $employee->id
                    AND
                    em.id = m.employee_id AND e.manager_id = m.employee_id
                    AND
                    e.user_id = u.id
                    AND
                    e.department_id = d.id
            "))[0];

        return view('employees.edit', compact('departments', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $employee = Employee::findOrFail($id);
        $user = User::findOrFail($employee->user_id);

        $employee->employee_number = request('employee_number');
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $user->username = request('username');
        $user->email = request('email');

        $employee->position = request('position');

        if (request('department_id') !== null) {
            $employee->department_id = (int)request('department_id');


            $employee->manager_id = DB::table('employees')
                ->select('id')
                ->where([
                    ['department_id', '=', $employee->department_id],
                    ['position', '=', 'Manager'],
                ])->get()[0]->id;
        }

        $user->save();
        $employee->save();

        return redirect('/employees');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $user = User::findOrFail($employee->user_id);

        $employee->delete();
        $user->delete();

        return redirect('/employees');
    }
}

