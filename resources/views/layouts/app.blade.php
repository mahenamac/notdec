<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config("app.name") }}</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset("css/app.css") }}" rel="stylesheet">
        <link href="{{ asset("css/style.css") }}" rel="stylesheet">
        <link href="{{ asset("css/icons.min.css") }}" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
        <!-- Favicon -->
        <link rel="icon" href="{{ asset("/images/favicon.ico") }}" type="image/png">
    </head>

    <body>
        <nav class="navbar navbar-light bg-light navbar-expand-lg fixed-top flex-md-nowrap p-0 border-bottom border-success">
            <div class="container-fluid">
            <a class="navbar-brand mr-0 text-success" href="/"><img src="{{ asset("/images/favicon.ico") }}" alt="logo" height="32"> {{ config("app.name") }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="navbar-toggler-icon"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav px-3 ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                        </a>
                            <ul class="dropdown-menu">
                            <a class="dropdown-item" href="/users/{{Auth::user()->id}}"><i class="fas fa-info-circle"></i> Profile</a>
                            <a class="dropdown-item" href="/users"><i class="far fa-user" aria-hidden="true"></i>  Staff</a>
                            @if(Gate::check('isAdmin') || Gate::check('isDirector'))
                                <a class="dropdown-item" href="/teams/{{Auth::user()->team_id}}"><i class="fas fa-grid"></i> Team</a>
                            @endif
                            @if(Gate::check('isAdmin'))
                            <a class="dropdown-item" href="/admin"><i class="fas fa-settings"></i> Admin</a>
                            @endif
                            <a class="dropdown-item" href="/help"><i class="far fa-life-ring"></i> Help</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        </nav>

        <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-bars"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/homes"><i class="fas fa-home"></i> Homes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/children"><i class="fas fa-child"></i> Children</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/guardians"><i class="far fa-user-circle"></i> Guardians</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/visitors"><i class="far fa-address-card"></i> Visitors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/documents"><i class="far fa-file"></i> Documents</a>
                    </li>
                </ul>
                <div class="dropdown-divider"></div>
                {{-- @if(Gate::check('isAdmin') || Gate::check('isDirector')) --}}
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Settings</span>
                        <span class="d-flex align-items-center text-muted"><i class="fas fa-plus"></i></span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin"><i class="fas fa-wrench"></i> Admin</a>
                        </li>
                    </ul>
                {{-- @endif --}}
                <div class="dropdown-divider"></div>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Reports</span>
                    <span class="d-flex align-items-center text-muted"><i class="fas fa-plus"></i></span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="/reports/last_month"><i class="far fa-file-alt"></i> last month</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/reports/last_quarter"><i class="far fa-file-alt"></i> Last quarter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/reports/last_year"><i class="far fa-file-alt"></i> Last year</a>
                    </li>
                </ul>
            </div>
            </nav>

            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-2 mt-2">
                {{-- Notifications Area --}}
                <div class="row">
                    <div class="col-md-6 offset-md-9 mb-0">
                        <div id="notices">
                            <div id="noticesPoint" class="pr-0"></div>
                        </div>
                    </div>
                </div>
                {{-- Content for all the pages --}}
                @yield("content")
            </main>
        </div>
        </div>
        {{-- Forms and Modals --}}
        @include("partials.modals")
        <!-- Scripts -->
        <script src="{{ asset("js/app.js") }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src="{{ asset("js/jquery.js") }}"></script>
        <script src="{{ asset("js/script.js") }}"></script>
    </body>
</html>
