@extends('navbar_login') 
@section('title', 'AppSys Login') 
@extends('background') 
@section('bgi') 
@section('content')
<div class="container">
    <div class="row">
        <div class="">

            <form method="POST" action="/requisition" class="col s12">
                {{ csrf_field() }}
                <div class="col s10 offset-s1">
                    <div class="container center">
                        <h4 class="card-panel">Login To Requisition A Vehicle</h4>
                    </div>
                    <div class="container">
                        <div class="center card-panel">
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
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection