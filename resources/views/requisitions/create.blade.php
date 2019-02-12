@extends('layout') 
@section('title', 'AppSys Requisition') 
@section('content')

<!-- Navbar goes here -->



@extends('navbar')
<!-- Page Layout here -->
<div class="row">

    <!-- Select a vehicle from a list -->
    <div class="input-field col s12 m4 l3">
        <select>

                  @php ($count = 1)
                  <option value="" disabled selected>Choose your option</option>
                  @foreach ($vehicles as $vehicle)
                     <option value={{ $count }}>{{ $vehicle->registration }} - {{ $vehicle->make }} {{ $vehicle->model }}</option> 
                     @php ($count++)
                  @endforeach
                </select>
        <label>Select Vehicle</label>
    </div>

    <!-- Main form -->

    <div class="col s12 m7 l8">
        <!-- Note that "m8 l9" was added -->

        <div class="">
            <form action="#" method="post">
                <div class="card">
                    <div class="card-content">

                        <!-- Start and return dates -->
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <div class="input-field">
                                    <input id="start_date" class="datepicker">
                                    <span class="helper-text" data-error="wrong" data-success="right">Start Date</span>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <div class="input-field">
                                    <input id="return_date" class="datepicker">
                                    <span class="helper-text" data-error="wrong" data-success="right">Return Date</span>
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

                            <div class="input-field col s6">
                                <select>

                                            @php ($count = 1)
                                            <option value="" disabled selected>Choose your option</option>
                                            @foreach ($officers as $officer)
                                               <option value={{ $count }}>{{ $officer->first_name}} {{ $officer->last_name}}</option> 
                                               @php ($count++)
                                            @endforeach
                                </select>
                                <label>First Line Approval Team</label>
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
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection