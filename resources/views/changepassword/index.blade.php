<?php $errors = Session::has('errors') ? Session::get('errors') : $errors; ?> 
@extends('layout') 
@extends('navbar') 
@section('title', 'Change Password') 
@section('content')

<div class="row">


    <!-- Left column -->
    <div class="col s3">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <a class="btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="New Requisition"
                        href="/requisitions/create"><i class="material-icons left">lock_open</i></a>
                </div>
                <div class="row"></div>
            </div>
        </div>
    </div>

    <!-- Middle column -->
    <div class="col s6">

        <div class="row">
            <div class="card">
                <div class="card-content container">
                    <form action="/changepassword/{{ Session::get('user_id') }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Current Password -->
                        <div class="row">
                            <div class="input-field"></div>
                            <input id="old_password" name="old_password" type="password" class="validate" required>
                            <label for="old_password">Old Password</label>
                        </div>

                        <!-- New Password -->
                        <div class="row">
                            <div class="input-field"></div>
                            <input id="new_password" name="new_password" type="password" class="validate" >
                            <label for="new_password">New Password</label>
                        </div>

                        <!-- Confirm Password -->
                        <div class="row">
                            <div class="input-field"></div>
                            <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="validate">
                            <label for="new_password_confirmation">Confirm Password</label>
                        </div>





                        <div class="center">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit<i class="material-icons right">send</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Right column -->
    <div class="col s3">
        <!-- Display errors here -->
        @if ($errors->any())
        <div class="red card darken-2">
            <div class="card-content">
                <h6>Please address the following.</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="white-text">{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif


    </div>
</div>
@endsection