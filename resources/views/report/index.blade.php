@extends('layout')
@extends('navbar')
@section('title', 'Requisitions')
@section('content')


<div class="row">
    <!-- Left column -->
    <div class="col s1">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <a class="blue darken-4 btn-floating waves-effect waves-light btn-large tooltipped" data-position="bottom" data-tooltip="Dashboard"
                        href="/dashboard"><i class="material-icons left">apps</i></a>
                </div>
            </div>
        </div>
    </div>



    <!-- Middle column -->
    <div class="col s10">
        <div class="row">
            <div class="card light-blue">
                <div class="row"></div>
                <div class="">
                    <h5 class="center">Requisitions Status Report
                </div>
                <div class="row"></div>
            </div>

            <div class="card blue lighten-3">
                <div class="card-content">
                    <table class="highlight responsive-table centered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Car</th>
                                <th>Emp</th>
                                <th>VTO</th>
                                <th>Mgr</th>
                                <th>Dpt</th>
                                <th>Purpose</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($count = 1) @foreach ($requisitions_status as $requisition)
                            <tr>
                                <td>{{ $count }}</td>
                            <td>{{ $requisition->registration}} - {{ $requisition->make_model}}</td>
                                <td>{{ $requisition->requester }}</td>
                                <td>{{ $requisition->officer }}</td>
                                <td>{{ $requisition->manager }}</td>
                                <td>{{ $requisition->department }}</td>
                                <td>{{ $requisition->purpose }}</td>
                                <td>{{ $requisition->start_date }}</td>
                                <td>{{ $requisition->return_date }}</td>
                                <td>{{ $requisition->pending_action }}</td>
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
