<div class="row navbar-fixed">
    <nav>
        <div class="nav-wrapper blue darken-4">
            @if (Session::has('id'))
            <a href="#" class="brand-logo left">{{ Session::get('first_name') . ' ' . Session::get('last_name') }}</a> @endif

            <a href="#" class="brand-logo center">Vehicle Requisition</a>
            <ul class="right hide-on-med-and-down">
                <div class="row"></div>
                <li>
                    <form action="/login" method="GET">
                        @csrf
                        <a class="btn-floating btn-large halfway-fab waves-effect waves-light red tooltipped" data-position="bottom" data-tooltip="Logout" href="/logout"><i class="material-icons">directions_run</i></a>
                </li>
                </form>
            </ul>
        </div>
    </nav>
</div>