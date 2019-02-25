@extends('layout') 
@extends('navbar') 
@section('title') 
@section('content')

<div class="row">
    <!-- Left column -->
    <div class="col s3">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="">
                        <a class="btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Vehicles" href="/vehicles"><i class="material-icons left">directions_car</i></a>
                    </div>
                </div>
                <div class="row"></div>
            </div>
        </div>
    </div>

    <!-- Middle column -->
    <div class="col s6">

        <div class="light-blue card">
            <div class="row"></div>
            <div class="">
                <h5 class="center">Add a New Vehicle</h5>
            </div>
        </div>

        <!-- Form to add new vehicle -->
        <div class="card">
            <div class="card-content">
                <form class="" action="/vehicles" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <!-- Registration -->
                        <div class="input-field">
                            <input id="registration" type="text" name="registration" value="{{ old('registration') }}">
                            <label for="registration">Registration</label>
                        </div>

                        <!-- Make-->
                        <div class="input-field">
                            <input id="make" type="text" name="make" value="{{ old('make') }}">
                            <label for="make">Make</label>
                        </div>

                        <!-- Model-->
                        <div class="input-field">
                            <input id="model" type="text" name="model" value="{{ old('model') }}">
                            <label for="model">Model</label>
                        </div>

                        <!-- Available-->
                        <div>
                            <label for="available">Available</label>
                        </div>
                        <form action="#">
                            <p>
                                <label>
                                        <input name="available" class="with-gap" value="Yes" type="radio" checked />
                                        <span>Yes</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                        <input name="available" class="with-gap" value="No" type="radio" />
                                        <span>No</span>
                                </label>
                            </p>
                        </form>

                        <div class="center col s12">
                            <button class="btn waves-effect waves-light" type="submit">Save<i class="material-icons right">save</i></button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Right column -->
    <div class="col s3">
        @if ($errors->any())
        <div class="red card darken-2">
            <div class="card-content">
                <h6 class="center">Please address the following.</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="white-text">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>

</div>
@endsection