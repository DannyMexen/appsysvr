@extends('layout') 
@extends('navbar') 
@section('title', 'Edit Vehicle') 
@section('content')



<div class="row">
    <!-- Left column -->
    <div class="col s3">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div>
                        <a class="btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Vehicles" href="/vehicles"><i class="material-icons">directions_car</i></a>
                    </div>
                </div>
                <div class="row"></div>
                <div class="col s12">
                    <div class="">
                        <form action="/vehicles/{{ $vehicle->id }}" method="POST">
                            @method('DELETE') @csrf
                            <button class="red btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Delete"><i class="material-icons">delete</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle column -->
    <div class="container col s6">

        <div class="light-blue card">
            <div class="row"></div>
            <div class="">
                <h5 class="center">Edit Vehicle Details</h5>
            </div>
            <div class="row"></div>
        </div>

        <!-- Form to edit a vehicle -->
        <div class="card">
            <div class="card-content">
                <form class="" action="/vehicles/{{ $vehicle->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <!-- Registration -->
                        <div class="input-field">
                            <input id="registration" type="text" name="registration" value="{{ $vehicle->registration }}">
                            <label for="registration">Registration</label>
                        </div>

                        <!-- Make-->
                        <div class="input-field">
                            <input id="make" type="text" name="make" value="{{ $vehicle->make }}">
                            <label for="make">Make</label>
                        </div>

                        <!-- Model-->
                        <div class="input-field">
                            <input id="model" type="text" name="model" value="{{ $vehicle->model }}">
                            <label for="model">Model</label>
                        </div>

                        <!-- Save changes -->
                        <div class="center col s12">
                            <button class="btn waves-effect waves-light" type="submit">Save<i class="material-icons right">save</i></button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Right column -->
    <div class="col s3"></div>
</div>
@endsection