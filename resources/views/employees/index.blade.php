@extends('layout') 
@extends('navbar') 
@section('title', 'Employees') 
@section('content')

<div class="row">
    <!-- Left column -->
    <div class="col s1">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="">
                        <a class="blue btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Add Employee"
                            href="/employees/create"><i class="material-icons left">add</i></a>
                    </div>
                    <div class="row"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle column -->
    <div class="container col s10">
        <div class="row">

            <div class="card light-blue">
                <div class="row"></div>
                <div class="">
                    <h5 class="center">Employees</h5>
                </div>
                <div class="row"></div>
            </div>

            <div class="card blue lighten-3">
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
                                <td><u><a href="/employees/{{ $employee->id }}/edit" class="black-text tooltipped" data-position="right" data-tooltip="Click to Edit">{{ $employee->employee_number }}</a></u></td>
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