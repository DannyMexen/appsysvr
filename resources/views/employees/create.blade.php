@extends('layout') 
@extends('navbar') 
@section('title', 'Add Employee') 
@section('content')


<div class="row">
    <!-- Left column -->
    @if ( $errors->any())
    <div class="col s1">
        @else
        <div class="col s2">
            @endif
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div>
                            <a class="btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Employees" href="/employees"><i class="material-icons left">group</i></a>
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
                        <h5 class="center">Add a New Employee</h5>
                    </div>
                </div>
            </div>

            <!-- Form to add new employee -->
            <div class="card">
                <div class="card-content">
                    <form class="" action="/employees" method="POST">
                        {{ csrf_field() }}
                        <div class="row">

                            <!-- Employee Number -->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="employee_number" type="text" name="employee_number" value="{{ old('employee_number') }}" class="validate" required>
                                        <label for="employee_number">Employee Number</label>
                                    </div>
                                </div>
                            </div>

                            <!-- First Name and Last Name-->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" class="validate" required>
                                        <label for="first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" class="validate" required>
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Username & E-mail-->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="username" type="text" name="username" value="{{ old('username') }}" class="validate" required>
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="validate" required>
                                        <label for="email">E-mail</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Position & Department -->
                            <div class="row">
                                <div class="col s6">
                                    <div class="input-field">
                                        <input id="position" type="text" name="position" value="{{ old('position') }}" class="validate" required>
                                        <label for="position">Position</label>
                                    </div>
                                </div>
                                <div class="input-field col s6">
                                    <select name="department_id" class="validate">
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