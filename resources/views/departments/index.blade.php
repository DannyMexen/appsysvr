@extends('layout') 
@extends('navbar') 
@section('title', 'AppSys - Departments') 
@section('content')

<div class="row">
    <div class="col s3"></div>
    <div class="container col s6">
        <div class="row">
            <div class="card orange">
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