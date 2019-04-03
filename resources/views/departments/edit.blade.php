@extends('layout') 
@extends('navbar') 
@section('title', 'Edit Dep') 
@section('content')



<div class="row">
    <!-- Left column -->
    <div class="col s3">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div>
                        <a class="btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Departments" href="/departments"><i class="material-icons">directions_car</i></a>
                    </div>
                    <div class="row"></div>
                </div>
                <div class="row"></div>
                <div class="col s12">
                    <div class="">
                        <form action="/departments/{{ $department->id }}" method="POST">
                            @method('DELETE') @csrf
                            <button class="red btn-floating waves-effect waves-light btn-large tooltipped" data-positon="bottom" data-tooltip="Delete"><i class="material-icons">delete</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Middle column -->
    <div class="container col s6">

        <div class="light-blue card">
            <div class="row"></div>
            <div class="">
                <h5 class="center">Edit Department Details</h5>
            </div>
            <div class="row"></div>
        </div>

        <!-- Form to edit a department-->
        <div class="card">
            <div class="card-content">
                <form class="" action="/departments/{{ $department->id }}" method="POST">
                    @method('PATCH') @csrf
                    <div class="row">
                        <!-- Name -->
                        <div class="input-field">
                            <input id="name" type="text" name="name" value="{{ $department->name }}">
                            <label for="name">Name</label>
                        </div>

                        <!-- Save changes -->
                        <div class="center col s12">
                            <button class="btn waves-effect waves-light" type="submit">Save<i class="material-icons right">save</i></button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Right column -->
    <div class="col s3">
        @if ($errors->any())
        <div class="red card darken-2">
            <div class="card-content">
                <h6 class="">Please address the following.</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="white-text">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection