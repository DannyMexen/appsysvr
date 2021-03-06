<?php $errors = Session::has('errors') ? Session::get('errors') : $errors; ?> 
@extends('layout') 
@extends('navbar') 
@section('title', 'Return Vehicle(s)') 
@section('content')


<div class="row">
    <!-- Left column -->
    <div class="col s1">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <a class="btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="New Requisition"
                        href="/requisitions/create"><i class="material-icons left">arrow_back</i></a>
                </div>
                <div class="row"></div>
            </div>
        </div>
    </div>



    <!-- Middle column -->
    <div class="col s10">
        <div class="row">
            <div class="card light-blue">
                <div class="row"></div>
                <div class="">
                    <h5 class="center">Requisitions
                </div>
                <div class="row"></div>
            </div>

            <div class="card blue lighten-3">
                <div class="card-content">
                    <table class="highlight responsive-table centered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Vehicle</th>
                                <th>Start Date</th>
                                <th>Return Date</th>
                                <th>Purpose</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($count = 1) @foreach ($requisitions as $requisition)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $requisition->registration}}</td>
                                <td>{{ $requisition->start_date}}</td>
                                <td>{{ $requisition->return_date}}</td>
                                <td>{{ $requisition->purpose}}</td>
                                <td><a class="waves-effect waves-light green btn" href="/return-vehicles/{{ $requisition->id }}">Return</a></td>
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