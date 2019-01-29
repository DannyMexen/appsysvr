@extends('layout') 
@section('content')
<div class="container">
    <h3>Welcome. Please Login.</h3>
</div>

<div class="container">
    <form>

        <div class="field">
            <div>
                <input type="text" placeholder="username">
            </div>
        </div>


        <div class="field">
            <div>
                <input type="password" placeholder="password">
            </div>
        </div>
    </form>
</div>
@endsection