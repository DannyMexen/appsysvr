@extends('layout') 
@extends('navbar') 
@section('title', 'Add Manager') 
@section('content')


<div class="row">
    <!-- Left column -->
    @if ($errors->any())
    <div class="col s1">
        @else
        <div class="col s2">
            @endif
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div>
                            <a class="blue btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Managers"
                                href="/managers"><i class="material-icons left">group_add</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Middle colum -->
        <div class="container col s8">

            <div class="card light-blue">
                <div class="row"></div>
                <div class="">
                    <div class="row">
                        <h5 class="center">Add a New Manager</h5>
                    </div>
                </div>
            </div>

            <!-- Form to add new managers-->
            <div class="card">
                <div class="card-content">
                    <form class="" action="/managers" method="POST">
                        {{ csrf_field() }}
                        <div class="row">

                            <!-- Employee Number & Department -->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="employee_number" type="text" name="employee_number" class="validate" value="{{ old('employee_number') }}">
                                        <label for="employee_number">Employee Number</label>
                                        <span class="helper-text">Example: EN9999</span>
                                    </div>
                                </div>

                                <div class="input-field col s6">
                                    <select name="department_id">
                                      @php ($count = 1)
                                      <option value="" disabled selected>Choose your option</option>
                                      @foreach ($departments as $department)
                                     <option value={{ $count }}>{{ $department->name }}</option> 
                                     @php ($count++)
                                      @endforeach
                                </select>
                                    <label>Department</label>
                                </div>
                            </div>

                            <!-- First Name and Last Name-->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="first_name" type="text" name="first_name" class="validate" value="{{ old('first_name') }}">
                                        <label for="first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="last_name" type="text" name="last_name" class="validate" value="{{ old('last_name') }}">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Username & E-mail-->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="username" type="text" name="username" class="validate" value="{{ old('username') }}">
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="email" type="email" name="email" class="validate" value="{{ old('email') }}">
                                        <label for="email">E-mail</label>
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
        <div class="col s3">
            @if ($errors->any())
            <div class="red card darken-2">
                <div class="card-content">
                    <h6 class="center">Please address the following.</h6>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="white-text">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>

    </div>
@endsection