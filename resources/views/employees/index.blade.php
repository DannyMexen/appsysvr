@extends('layout') 
@extends('navbar') 
@section('title', 'AppSys - Employees') 
@section('content')

<div class="row">
    <!-- Left column -->
    <div class="col s1">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <a class="blue btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Add Employee" href="/employees/create"><i class="material-icons left">add</i></a>
                </div>
                <div class="row"></div>
                <div class="col s12">
                    <a class="orange btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Add Manager" href="/managers/create"><i class="material-icons left">add</i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle column -->
    <div class="container col s10">
        <div class="row">
            <div class="card light-blue">
                <div class="card-content">
                    <h5 class="center">Employees</div>
            </div>
            <div class="card teal">
                <div class="card-content">
                    <table class="highlight responsive-table centered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Emp. No.</th>
                                <th>Username</th>
                                <th>E-mail</th>
                                <th>Position</th>
                                <th>Department</th>
                                <th>Manager</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($count = 1) @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $employee->employee_number}}</td>
                                <td>{{ $employee->username}}</td>
                                <td>{{ $employee->email}}</td>
                                <td>{{ $employee->position}}</td>
                                <td>{{ $employee->department}}</td>
                                <td>{{ $employee->manager}}</td>
                                @php ($count++)
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s1">
        </div>
    </div>
@endsection