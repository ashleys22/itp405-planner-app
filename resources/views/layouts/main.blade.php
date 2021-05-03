<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/tasks.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
    <style>
        .navigation {
            background-color: #3a6ea5 !important;
            height: 50px;
        }
        ul.nav li:hover { 
            padding-bottom: 25px;
            border-bottom: 3px solid aliceblue;
        }

        .navigation li:hover a{ 
            color: #001d3d !important;
        }
        .navigation li {
            padding:5px;
        }
        .logout:hover {
            color: #001d3d !important;
        }
        .about {
            position: absolute;
            left: 10px;
            top: 4px;
        }

        .about:hover a {
            color: #001d3d !important;
        }

        .account {
            position: absolute;
            right: 3%;
            top: 10px;
        }
    </style>

</head>
<body>
    <ul class="navigation nav justify-content-center"> 
        <div class="about d-flex">
            <a class="nav-link mt-1 ms-3 text-light my-auto" href="/about" class="text-light btn btn-link">About</a>
        </div>
        @if (Auth::check()) 
            <li class="nav-item h-100">
                <a class="nav-link mt-1 me-2 text-dark my-auto" href="{{ route('courses.index') }}">
                    Courses
                </a>
            </li>
        @endif
        <li class="nav-item h-100">
            <a class="navbar-brand text-dark" href="{{ route('tasks.index') }}">
                <img src="/img/planner.png" alt="" width="45" height="50" class="d-inline-block align-text-center">
                My Planner
            </a>
        </li>
        @if (Auth::check())
            <li class="nav-item h-100">
                <a class="nav-link mt-1 me-5 text-dark my-auto" href="{{ route('tasks.bookmarks') }}">Bookmarks</a>
            </li>
        @endif
        <div class="account d-flex">
            @if (Auth::check())
                <p class="my-auto text-light">Welcome back, <br> {{ Auth::user()->username }}!</p>
                <form method="post" action="{{ route('auth.logout') }}">
                    @csrf
                    <button type="submit" class="logout text-light btn btn-link ms-2">Logout</button>
                </form>
            @else 
                <a href="{{ route('registration.index') }}" class="nav-link text-light btn btn-link logout ms-5">Register</a>
                <a href="{{ route('auth.loginForm') }}" class="nav-link text-light btn btn-link logout ms-3">Login</a>
            @endif
        </div>
    </ul>

    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-12">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>