@extends('layout') 
@extends('navbar') 
@section('title') 
@section('content')

<div class="container">
    <h5 class="center">Add a New Vehicle</h5>


    <!-- Form to add new vehicle -->

    <div class="row">
        <form class="col s12" action="/vehicles" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col s3"></div>
                <div class="card col s6">
                    <div class="card-content">
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

                        <div class="row"></div>
                        <div class="center col s12">
                            <button class="btn waves-effect waves-light" type="submit">Save<i class="material-icons right">save</i></button>
                        </div>
                        <div class="row"></div>

                    </div>
                </div>
                <div class="col s3"></div>
            </div>
        </form>
    </div>
</div>
@endsection