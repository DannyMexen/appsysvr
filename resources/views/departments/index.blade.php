@extends('layout') 
@extends('navbar') 
@section('title', 'AppSys - Departments') 
@section('content')

<div class="row">
    <!-- Left column -->
    <div class="col s3">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <a class="btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Dashboard" href="/dashboard"><i class="material-icons left">apps</i></a>
                </div>
                <div class="row"></div>
                <div class="col s12">
                    <a class="blue btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Add Department"href="/departments/create"><i class="material-icons left">add</i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle column -->
    <div class="container col s6 ">
        <div class="row ">
            <div class="card light-blue ">
                <div class="row "></div>
                <div class=" ">
                    <h5 class="center ">Departments</h5>
                </div>
                <div class="row "></div>
            </div>
            <div class="card blue lighten-3 ">
                <div class="card-content ">
                    <table class="highlight responsive-table centered ">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($count = 1) @foreach ($departments as $department)
                            <tr>
                                <td>{{ $count }}</td>
                                <td><u><a href="/departments/{{ $department->id }}/edit" class="black-text
                    tooltipped" data-position="right" data-tooltip="Click to Edit">{{ $department->name}}</a>
                    </u>
                                </td>
                                @php ($count++)
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col s3"></div>
</div>
@endsection