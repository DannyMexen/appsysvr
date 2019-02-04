@extends('layout') 
@extends('navbar') 
@section('title') 
@section('content')

<div class="container">
    <h5 class="center">Add a New Vehicle</h5>


    <!-- Form to add new vehicle -->

    <div class="row">
        <form class="col s12" action="">
            <div class="row">

                <!-- Registration -->
                <div class="input-field">
                    <input id="registration" type="text">
                    <label for="registration">Registration</label>
                </div>

                <!-- Make-->
                <div class="input-field">
                    <input id="make" type="text">
                    <label for="make">Make</label>
                </div>

                <!-- Model-->
                <div class="input-field">
                    <input id="model" type="text">
                    <label for="model">Model</label>
                </div>

                <!-- Available-->

                <form action="#">
                    <p>
                        <label>
                                        <input name="group1" type="radio" checked />
                                        <span>Yes</span>
                                      </label>
                    </p>
                    <p>
                        <label>
                                        <input name="group1" type="radio" />
                                        <span>No</span>
                                      </label>
                    </p>
                </form>

            </div>
        </form>
    </div>
</div>
@endsection

