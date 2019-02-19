@extends('layout') 
@extends('navbar') 
@section('title', 'Edit Employee') 
@section('content')



<div class="row">
    <!-- Left column -->
    <div class="col s2">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div>
                        <a class="btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Employees" href="/employees"><i class="material-icons">group</i></a>
                    </div>
                </div>
                <div class="row"></div>
                <div class="col s12">
                    <div class="">
                        <form action="/employees/{{ $employee->id }}" method="POST">
                            @method('DELETE') @csrf
                            <button class="red btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Delete"><i class="material-icons">delete</i>
                            </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle colum -->
    <div class="container col s8">

        <div class="card light-blue">
            <div class="row"></div>
            <div class="">
                <div class="">
                    <h5 class="center">Edit Employee</h5>
                </div>
            </div>
            <div class="row"></div>
        </div>

        <!-- Form to add new employee -->
        <div class="card">
            <div class="card-content">
                <form class="" action="/employees/{{ $employee->id }}" method="POST">
                    {{ csrf_field() }} {{ method_field('PATCH')}}
                    <div class="row">

                        <!-- Employee Number -->
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input id="employee_number" type="text" name="employee_number" value="{{ $employee->employee_number }}">
                                    <label for="employee_number">Employee Number</label>
                                </div>
                            </div>
                        </div>

                        <!-- First Name and Last Name-->
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input id="first_name" type="text" name="first_name" value="{{ $employee->first_name}}">
                                    <label for="first_name">First Name</label>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="input-field">
                                    <input id="last_name" type="text" name="last_name" value="{{ $employee->last_name }}">
                                    <label for="last_name">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <!-- Username & E-mail-->
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input id="username" type="text" name="username" value="{{ $employee->username }}">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="input-field">
                                    <input id="email" type="text" name="email" value="{{ $employee->email }}">
                                    <label for="email">E-mail</label>
                                </div>
                            </div>
                        </div>

                        <!-- Position & Department -->
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input id="position" type="text" name="position" value="{{ $employee->position}}">
                                    <label for="position">Position</label>
                                </div>
                            </div>
                            <div class="input-field col s6">
                                <select name="department_id">
                                      @php ($count = 1)
                                      <option value="" disabled selected>{{ $employee->department }}</option>
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

        <!-- Right column -->
        <div class="col s2"></div>
    </div>
</div>
@endsection