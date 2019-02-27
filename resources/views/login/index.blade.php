@extends('layout') 
@extends('navbar_login') 
@extends('background') 
@section('title', 'AppSys Login') 
@section('content')

<div class="row">
<div class="col s4"></div>
    <div class="col s4">
        <form method="POST" action="/login">
            {{ csrf_field() }}

            <div class="center">
                <h4 class="card-panel grey lighten-3">Login</h4>
            </div>

            <div class="center card-panel">
                <div class="row">
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

                    <div class="input-field">
                        <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i></button>
                    </div>
                </div>

            </div>
        </form>
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