@extends('layout') 
@section('title', 'AppSys Requisition') 
@section('content')





<!-- Navbar goes here -->

<!-- Page Layout here -->
<div class="row">

    <!-- Select a vehicle from a list -->
    <div class="col s12 m4 l3">
        <label>Select a Vehicle</label>
        <select class="browser-default">
              <option value="" disabled selected>Nothing Selected</option>
              <option value="1">Toyota Hilux - AHB 2354</option>
              <option value="2">Toyota Landcruiser - ABF 114</option>
              <option value="3">Toyota Landcruiser - ABL 6775</option>
            </select>
    </div>

    <!-- Main form -->

    <div class="col s12 m8 l9">
        <!-- Note that "m8 l9" was added -->

        <div class="">
            <form action="#" method="post">
                <div class="row">
                    <!-- Search bar -->
                    <div class="input-field col s6">
                        <input id="search" type="text">
                        <label for="search">Search</label>
                    </div>
                    <div class="input-field col s6">
                        <input disabled id="car_details" type="text">
                        <label for="car_details">Car details will appear here</label>
                    </div>

                    <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Search<i class="material-icons right">search</i></button>
                    </div>
                </div>

                <!-- Start and return dates -->
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <input id="start_date" type="text">
                            <label for="start_date">Start Date</label>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="input-field">
                            <input id="return_date" type="text">
                            <label for="return_date">Return Date</label>
                        </div>
                    </div>
                </div>

                <!-- Purpose -->
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="purpose" class="materialize-textarea"></textarea>
                        <label for="purpose">Purpose</label>
                        <span class="helper-text" data-error="wrong" data-success="right">State briefly how you intend on using this vehicle</span>
                    </div>
                </div>

                <!-- Approval personnel -->
                <div class="row">
                    <div class="col s6">
                        <label>Vehicle Requisition Team</label>
                        <select class="browser-default">
              <option value="" disabled selected>No one Selected</option>
              <option value="1">John Banda</option>
              <option value="2">Jane Phiri</option>
            </select>
                    </div>
                    <div class="input-field col s6">
                        <input disabled id="manager" type="text">
                        <label for="manager">Amos Chanda</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Manager</span>
                    </div>
                    <div class="col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit<i class="material-icons right">send</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection