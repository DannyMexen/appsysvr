@extends('layout') 
@extends('navbar') 
@section('title') 
@section('content')

<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card">
                <table class="highlight responsive table responsive-table centered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Registration</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Available? (Y/N)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($count = 1) @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $vehicle->registration }}</td>
                            <td>{{ $vehicle->make}}</td>
                            <td>{{ $vehicle->model}}</td>
                            <td>{{ $vehicle->available}}</td>
                            @php ($count++)
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection