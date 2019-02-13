@extends('layout') 
@extends('navbar') 
@section('title', 'Requisitions') 
@section('content')


<div class="row">
    <!-- Left column -->
    <div class="col s1"></div>

    <!-- Middle column -->
    <div class="col s10">
        <div class="row">
            <div class="card light-blue">
                <div class="card-content">
                    <h5 class="center">Requisitions
                </div>
            </div>

            <div class="card teal">
                <div class="card-content">
                    <table class="highlight responsive-table centered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Vehicle</th>
                                <th>Start Date</th>
                                <th>Return Date</th>
                                <th>Requested By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($count = 1) @foreach ($requisitions as $requisition)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $requisition->registration}}</td>
                                <td>{{ $requisition->start_date}}</td>
                                <td>{{ $requisition->return_date}}</td>
                                <td>{{ $requisition->employee_number}}</td>
                                <td><a class="waves-effect waves-light orange btn">Details</a></td>
                                <td><a class="waves-effect waves-light green btn">Approve</a></td>
                                <td><a class="waves-effect waves-light red btn">Reject</a></td>
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