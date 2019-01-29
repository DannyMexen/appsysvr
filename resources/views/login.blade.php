@extends('layout') 
@section('title')
@endsection
 
@section('content')
<div class="container">
    <div class="row">
        <div class="card">

            <form method="POST" action="/requisition">
                {{ csrf_field() }}
                
                <div class="center">
                    <h4 class="teal lighten white-text">Login</h4>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="input-field">
                            <i class="material-icons prefix">face</i>
                            <input type="text" id="username" name="username">
                            <label for="username">Username</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input type="password" id="password">
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i></button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
@endsection