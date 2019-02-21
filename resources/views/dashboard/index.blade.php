@extends('layout') 
@extends('navbar') 
@section('title', 'Admin Console') 
@section('content')

<div class="container">

<!-- Requisitions -->
    <div class="row">
        <div class="col s3"></div>

        <div class="col s6">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="/img/requisitions.png">
                </div>
                <div class="card-stacked">
                    <div class="blue lighten-3 card-content">
                        <span class="card-title">Requisitions</span>
                        <p>Administrate requisitions.</p>
                    </div>
                    <div class="blue darken-4 card-action">
                        <div class="center">
                            <a href="/requisitions">PROCEED</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s3"></div>
    </div>

    <!-- Employees and managers -->
    <div class="row">

        <div class="col s6">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="/img/employees.png">
                </div>
                <div class="card-stacked">
                    <div class="blue lighten-3 card-content">
                        <span class="card-title">Employees</span>
                        <p>Administrate staff.</p>
                    </div>
                    <div class="blue darken-4 card-action">
                        <div class="center">
                            <a href="/employees">PROCEED</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s6">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="/img/managers.png">
                </div>
                <div class="card-stacked">
                    <div class="blue lighten-3 card-content">
                        <span class="card-title">Managers</span>
                        <p>Administrate managerial staff.</p>
                    </div>
                    <div class="blue darken-4 card-action">
                        <div class="center">
                            <a href="/managers">PROCEED</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Departments and vehicles-->
    <div class="row">

        <div class="col s6">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="/img/departments.png">
                </div>
                <div class="card-stacked">
                    <div class="blue lighten-3 card-content">
                        <span class="card-title">Departments</span>
                        <p>Administrate departments.</p>
                    </div>
                    <div class="blue darken-4 card-action">
                        <div class="center">
                            <a href="/departments">PROCEED</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s6">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="/img/vehicles.png">
                </div>
                <div class="card-stacked">
                    <div class="blue lighten-3 card-content">
                        <span class="card-title">Vehicles</span>
                        <p>Administrate vehicles.</p>
                    </div>
                    <div class="blue darken-4 card-action">
                        <div class="center">
                            <a href="/vehicles">PROCEED</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    
</div>
@endsection