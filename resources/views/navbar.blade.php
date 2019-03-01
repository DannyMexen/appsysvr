<div class="row navbar-fixed">
    <nav>
        <div class="nav-wrapper blue darken-4">
            
            <a href="#" class="brand-logo center">AppSys</a>
            <ul class="right hide-on-med-and-down">
                <div class="row"></div>
                <li>
                    <form action="/login" method="GET">
                        @csrf
                        <a class="waves-effect waves-light btn red" href="/login">LOGOUT</a></li>
                </form>
            </ul>
        </div>
    </nav>
</div>