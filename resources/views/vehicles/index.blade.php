@extends('layout') 
@extends('navbar') 
@section('title') 
@section('content')

<div class="container">
    <table class="highlight responsive table responsive-table centered">
        <thead>
            <tr>
                <th>Registration</th>
                <th>Make</th>
                <th>Model</th>
                <th>Available? (Y/N)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->registration }}</td>
                <td>{{ $vehicle->make}}</td>
                <td>{{ $vehicle->model}}</td>
                <td>{{ $vehicle->available}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection