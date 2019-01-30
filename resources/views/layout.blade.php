<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'AppSys')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
    <div class="row">
        <nav>
            <div class="nav-wrapper teal">
                <a href="#" class="brand-logo center">AppSys<i class="large material-icons">drive_eta</i></a>
            </div>
        </nav>


        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </div>
</body>

</html>