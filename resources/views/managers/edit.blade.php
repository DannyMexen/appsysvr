@extends('layout') 
@extends('navbar') 
@section('title', 'Edit Manager') 
@section('content')



<div class="row">
    <!-- Left column -->
    @if (session()->has('message') || $errors->any())
    <div class="col s1">
        @else
        <div class="col s2">
            @endif
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div>
                            <a class="blue btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Managers"
                                href="/managers"><i class="material-icons">group_add</i></a>
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col s12">
                        <div class="">
                            <form action="/resetpassword/{{ $manager->id }}" method="POST">
                                @method('PATCH') @csrf
                                <button class="btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Reset Password"><i class="material-icons">security</i></button>
                            </form>
                        </div>
                    </div>

                    <div class="row"></div>
                    <div class="col s12">
                        <div class="">
                            <form action="/managers/{{ $manager->id }}" method="POST">
                                @method('DELETE') @csrf
                                <button class="red btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Delete"><i class="material-icons">delete</i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Middle colum -->
        <div class="container col s8">

            <div class="light-blue card">
                <div class="row"></div>
                <div class="">
                    <div class="row">
                        <h5 class="center">Edit Manager</h5>
                    </div>
                </div>
            </div>

            <!-- Form to edit manager's details -->
            <div class="card">
                <div class="card-content">
                    <form class="" action="/managers/{{ $manager->id }}" method="POST">
                        {{ csrf_field() }} {{ method_field('PATCH')}}
                        <div class="row">

                            <!-- Employee Number -->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="employee_number" type="text" name="employee_number" value="{{ $manager->employee_number }}">
                                        <label for="employee_number">Employee Number</label>
                                    </div>
                                </div>
                            </div>

                            <!-- First Name and Last Name-->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="first_name" type="text" name="first_name" value="{{ $manager->first_name}}">
                                        <label for="first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="last_name" type="text" name="last_name" value="{{ $manager->last_name }}">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Username & E-mail-->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="username" type="text" name="username" value="{{ $manager->username }}">
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="email" type="text" name="email" value="{{ $manager->email }}">
                                        <label for="email">E-mail</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Position & Department -->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input disabled id="position" type="text" name="position" value="{{ $manager->position}}">
                                        <label for="position">Position</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input disabled id="department" type="text" name="department" value="{{ $manager->department}}">
                                        <label for="position">Department</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Save Button -->
                            <div class="center col s12">
                                <button class="btn waves-effect waves-light" type="submit">Save<i class="material-icons right">save</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right column -->
        @if (session()->has('message'))
        <div class="col s3">
            <div class="green card darken-2">
                <div class="card-content">
                    {{ session()->get('message') }}
                </div>
            </div>
        </div>
        @else
        <div class="col s2"></div>
        @endif @if ($errors->any())
        <div class="col s3">
            <div class="red card darken-2">
                <div class="card-content">
                    <h6 class="">Please address the following.</h6>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="white-text">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

    </div>
@endsection