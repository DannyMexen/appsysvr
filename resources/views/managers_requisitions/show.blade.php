@extends('layout') 
@extends('navbar') 
@section('title', 'Requisition Details') 
@section('content')


<div class="row">
    <!-- Left column -->
    <div class="col s1">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <a class="blue btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Requisitions"
                        href="/managers-requisitions"><i class="material-icons left">list</i></a>
                </div>
                <div class="row"></div>

                <div class="col s12">
                    <a class="green btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Approve"
                        href="/managers-approvals"><i class="material-icons left">check</i></a>
                </div>

                <div class="row"></div>
                <div class="col s12">
                    <a class="red btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Reject" href="/managers-rejections"><i class="material-icons left">clear</i></a>
                </div>
                <div class="row"></div>


            </div>
        </div>
    </div>

    <!-- Middle column -->
    <div class="col s10">
        <!--
        <div class="">
            <div class="light-blue card">
                <div class="row"></div>
                <div>
                    <h5 class="center">Requisition Details</h5>
                </div>
                <div class="row"></div>
            </div>
        </div>
    -->

        <!-- Vehicle Details -->
        <div class="card">
            <div class="">
                <table class="centered responsive-table">
                    <thead class="blue lighten-3">
                        <tr>
                            <th>Registration</th>
                            <th>Make</th>
                            <th>Model</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $requisition->registration }}</td>
                            <td>{{ $requisition->make}}</td>
                            <td>{{ $requisition->model}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row"></div>

        <!-- Requester Details -->
        <div class="card">
            <div class="">
                <table class="centered responsive-table">
                    <thead class="blue lighten-3">
                        <tr>
                            <th>Requested By</th>
                            <th>Manager</th>
                            <th>VT Officer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $requisition->requester }}</td>
                            <td>{{ $requisition->manager }}</td>
                            <td>{{ $requisition->officer }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row"></div>

        <!-- Requisition Details -->
        <div class="card">
            <div class="">
                <table class="centered responsive-table">
                    <thead class="blue lighten-3">
                        <tr>
                            <th>Vehicle Use Will Begin On</th>
                            <th>Vehicle Will Be Returned On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $requisition->start_date }}</td>
                            <td>{{ $requisition->return_date }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row"></div>

        <!-- Requisition Details (Purpose)-->
        <div class="card">
            <div class="">
                <table class="centered responsive-table">
                    <thead class="blue lighten-3">
                        <tr>
                            <th>Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $requisition->purpose }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right column -->
    <div class="col s1"></div>
</div>
@endsection