@extends('layout') 
@extends('navbar') 
@section('title') 
@section('content')

<div class="row">
    <div class="col s3"></div>
    <div class="container col s6">

        <div class="card orange">
            <div class="card-content">
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
                            <input id="registration" type="text" name="registration">
                            <label for="registration">Registration</label>
                        </div>

                        <!-- Make-->
                        <div class="input-field">
                            <input id="make" type="text" name="make">
                            <label for="make">Make</label>
                        </div>

                        <!-- Model-->
                        <div class="input-field">
                            <input id="model" type="text" name="model">
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
        <div class="col s3"></div>
    </div>
</div>
@endsection