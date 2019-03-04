<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use App\Employee;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Redirect::refresh();
        return view('login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $errors = new MessageBag();
        $errors->add('password', 'The password is invaild');

        $username = request()->validate(['username' => ['required', 'exists:users']], ['username.required' => 'The username is required'])['username'];
        $password = request()->validate(['hash' => ['required']], ['hash.required' => 'The password is required'])['hash'];

        $user = User::where('username', $username)->firstOrFail();

        if (password_verify($password, $user->password)) {

            /**
             * SPECIAL NOTES REGARDING LOGIN
             * There are three types of user
             * 1. Admin - full access (typically IT, but this will include the Vehicle & Transportation team)
             * 2. Employee - only has access to creating requisitions
             * 3. Manager - only has access to pending requisitions under them
             * 
             * Depending on who is logging in, display the appropriate view
             * 
             * 1. Admin - display the dashboard
             * 2. Normal user - requisition creation form
             * 3. Manager - pending requisitions
             * 
             * Step 1: Retrieve the user's full details
             * Step 2: Check who they are
             * Step 3: Redirect them accordingly
             * Step 4: Put their information in a session
             */

            $employee = Employee::where('user_id', $user->id)->firstOrFail();

            session([
                'id' => $employee->id,
                'first_name' => $employee->first_name,
                'last_name' => $employee->last_name,
                'user_id' => $employee->user_id,
                'employee_number' => $employee->employee_number,
                'position' => $employee->position,
                'department_id' => $employee->department_id,
                'manager_id' => $employee->manager_id
            ]);


            if ((strcmp($employee->position, 'Manager') !== 0)  && (strcmp($employee->position, 'VT Officer') !== 0)  && (strcmp($employee->position, 'Admin') !== 0)) {

                return redirect('/requisitions/create');
            } elseif ((strcmp($employee->position, 'VT Officer') === 0) || (strcmp($employee->position, 'Admin') === 0)) {

                return redirect('/dashboard');
            } else {

                return redirect('/requisitions');
            }
        } else {
            return back()->withErrors($errors)->withInput(Input::all());
        }


        return $user;
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
