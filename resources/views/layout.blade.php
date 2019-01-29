<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ 'title', 'AppSys' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style type="text/css">
        body {
            background-image: url("/img/bgi.png");
            background-repeat: no-repeat;
            background-size: cover;
        } 
    </style>
</head>

<body>
    <nav>
        <div class="nav-wrapper teal">
            <a href="#" class="brand-logo center">AppSys - Vehicle Requisition Approval System</a>
        </div>
    </nav>


    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>