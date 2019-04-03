@extends('layout') 
@extends('navbar') 
@section('title', 'AppSys - Add Department') 
@section('content')


<div class="row">
    <!-- Left column -->
    <div class="col s3">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <a class="btn-floating waves-effect waves-light btn-large" href="/departments"><i class="material-icons left">chevron_left</i></a>
                </div>
                <div class="row"></div>
            </div>
        </div>
    </div>

    <!-- Middle colum -->
    <div class="container col s6">

        <div class="card light-blue">
            <div class="card-content">
                <div class="row">
                    <h5 class="center">Add a New Department </h5>
                </div>
            </div>
        </div>

        <!-- Form to add new department-->
        <div class="card">
            <div class="card-content">
                <form class="" action="/departments" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <!-- Name-->
                        <div class="input-field">
                            <input id="name" type="text" name="name" class="validate" value="{{ old('name') }}">
                            <label for="name">Name</label>
                        </div>

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

</div>
@endsection