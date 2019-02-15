@extends('layout') 
@extends('navbar') 
@section('title', 'Vehicles') 
@section('content')

<div class="row">
    <!-- Left column -->
    <div class="col s1">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <a class="blue btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Add Vehicle"
                        href="/vehicles/create"><i class="material-icons left">add</i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle column -->
    <div class="col s10">
        <div class="row">
            <div class="light-blue card">
                <div class="row"></div>
                <div class="">
                    <h5 class="center">Vehicles</h5>
                </div>
                <div class="row"></div>
            </div>
            <div class="card teal">
                <div class="card-content">
                    <table class="highlight responsive-table centered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Registration</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Available</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($count = 1) @foreach ($vehicles as $vehicle)
                            <tr>
                                <td>{{ $count }}</td>
                                <td><u><a href="/vehicles/{{ $vehicle->id }}/edit" class="black-text tooltipped" data-position="right" data-tooltip="Click to Edit">{{ $vehicle->registration}}</a></u></td>
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
    <!-- Right column -->
    <div class="col s1"></div>
</div>
@endsection