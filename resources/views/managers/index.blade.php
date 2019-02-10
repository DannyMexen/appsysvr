@extends('layout') 
@extends('navbar') 
@section('title', 'Managers') 
@section('content')


<div class="row">
    <!-- Left column -->
    <div class="col s1">
        <div class="container">
            <div class="row">
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
                    <h5 class="center">Managers</div>
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
                                <th>Department</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($count = 1) @foreach ($managers as $manager)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $manager->employee_number}}</td>
                                <td>{{ $manager->username}}</td>
                                <td>{{ $manager->email}}</td>
                                <td>{{ $manager->department}}</td>
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