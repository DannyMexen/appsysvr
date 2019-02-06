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
                    <a class="orange btn-floating waves-effect waves-light btn-large" href="/departments/create"><i class="material-icons left">add</i></a>
                </div>
                <div class="row"></div>
                <div class="col s12">
                    <a class="red btn-floating waves-effect waves-light btn-large" href=""><i class="material-icons left">delete</i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle column -->
    <div class="container col s6">
        <div class="row">
            <div class="card light-blue">
                <div class="card-content">
                    <h5 class="center">Departments</h5>
                </div>
            </div>
            <div class="card teal">
                <div class="card-content">
                    <table class="highlight responsive-table centered">
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
                                <td>{{ $department->name}}</td>
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