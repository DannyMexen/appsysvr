@extends('layout') 
@section('content')
<div class="container">
    <div class="row">
        <div class="card">

            <form>
                <div class="center">
                    <h4 class="teal lighten white-text">Login</h4>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="input-field">
                            <i class="material-icons prefix">face</i>
                            <input type="text" id="username">
                            <label for="username">Username</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">https</i>
                            <input type="password" id="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
@endsection