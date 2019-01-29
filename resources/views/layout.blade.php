<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ 'title', 'AppSysFVR' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="nav-wrapper teal lighten">
            <a href="#" class="brand-logo center">Approval System for Vehicle Requisitions.</a>
        </div>
    </nav>


    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>