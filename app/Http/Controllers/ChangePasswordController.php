<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
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

        return view('change_password.index');
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

        // Validation
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
        $errors = new MessageBag();
        $errors->add('password', 'The password is invaild');

        $old_password = request()->validate(['old_password' => ['required']], ['old_password.required' => 'The current password is required'])['old_password'];
        $new_password = request()->validate(['new_password' => ['required', 'confirmed']], ['new_password.required' => 'The new password is required'])['new_password'];
        $new_password_confirmation = request()->validate(['new_password_confirmation' => ['required', 'same:new_password']], ['new_password_confirmation.required' => 'The new password must be confirmed'])['new_password_confirmation'];

        $user = User::findOrFail(session('user_id'));

        if ((password_verify($old_password, $user->password))) {

            $user->password = Hash::make(request('new_password'));

            $user->save();

            session()->flush();
            return redirect('/login');
        } else {

            return back()->withErrors($errors);
        }
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
