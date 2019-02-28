@extends('layout') 
@extends('navbar_login') 
@extends('background') 
@section('title', 'AppSys Login') 
@section('content')

<div class="row">
    <!-- Left column -->
    <div class="col s4"></div>

    <!-- Middle column -->
    <div class="col s4">
        <div class="row">
            <div class="card">
                <div class="card-content">

                    <form method="POST" action="/login">
                        {{ csrf_field() }}

                        <div class="input-field">
                            <i class="material-icons prefix">face</i>
                            <input type="text" id="username" name="username" value="{{ old('username') }}">
                            <label for="username">Username</label>
                        </div>

                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input type="password" id="password" name="hash">
                            <label for="password">Password</label>
                        </div>

                        <div class="input-field center">
                            <button class="btn waves-effect waves-light blue darken-2" type="submit" name="action">Login
                                        <i class="material-icons right">send</i></button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Right column -->
    <div class="col s4">
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