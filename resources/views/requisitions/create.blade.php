@extends('layout') 
@extends('navbar') 
@section('title', 'New Requisition') 
@section('content')


<!-- Page Layout here -->
<div class="row">
    <!-- Left column -->
    <div class="col s1"></div>


    <form action="/requisitions" method="post">
        {{ csrf_field() }}
        <!-- Main form -->
        <div class="col s7">

            <div class="">
                <div class="card">
                    <div class="card-content">

                        <!-- Start and return dates -->
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <div class="input-field">
                                    <input id="start_date" name="start_date" class="datepicker">
                                    <span class="helper-text" data-error="wrong" data-success="right">Start Date</span>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <div class="input-field">
                                    <input id="return_date" name="return_date" class="datepicker">
                                    <span class="helper-text" data-error="wrong" data-success="right">Return Date</span>
                                </div>
                            </div>
                        </div>

                        <!-- Purpose -->
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="purpose" name="purpose" class="materialize-textarea"></textarea>
                                <label for="purpose">Purpose</label>
                                <span class="helper-text" data-error="wrong" data-success="right">State briefly how you intend on using this vehicle</span>
                            </div>
                        </div>

                        <!-- Approval personnel -->
                        <div class="row">

                            <div class="input-field col s6">
                                <select name="officer_id">

                                            @php ($count = 1)
                                            <option value="" disabled selected>Choose your option</option>
                                            @foreach ($officers as $officer)
                                               <option value={{ $officer->id }}>{{ $officer->first_name}} {{ $officer->last_name}}</option> 
                                               @php ($count++)
                                            @endforeach
                                </select>
                                <label>First Line Approval</label>
                            </div>

                            <!-- Change to department -->
                            <div class="input-field col s6">
                                <input readonly id="manager" name="manager_department" value="Chanda Mulenga - Legal" type="text">
                                <label for="manager">Manager & Department</label>
                            </div>

                            <div class="center">
                                <button class="blue darken-3 btn waves-effect waves-light" type="submit" {{ (empty(session( 'id')) ? 'disabled': '') }}>Submit<i class="material-icons right">send</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right column -->
        <div class="col s4">
            <!-- Select a vehicle from a list -->
            <div class="input-field">
                <select name="vehicle_id">

                  @php ($count = 1)
                  <option value="" disabled selected>Choose your option</option>
                  @foreach ($vehicles as $vehicle)
                     <option value={{ $vehicle->id }}>{{ $vehicle->registration }} - {{ $vehicle->make }} {{ $vehicle->model }}</option> 
                     @php ($count++)
                  @endforeach
                </select>
                <label>Select Vehicle</label>
            </div>

            <!-- Display errors here -->
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


    </form>
</div>
@endsection