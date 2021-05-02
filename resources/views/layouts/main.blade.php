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
        .navbar {
            background-color: white!important;
            opacity: 0.6;
            padding: 0;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-between">
          <a class="navbar-brand mx-auto" href="{{ route('tasks.index') }}">
            <img src="/img/planner.png" alt="" width="45" height="50" class="d-inline-block align-text-center">
            My Planner
          </a>
          <div class="account d-flex">
            @if (Auth::check())
                <p class="my-auto">Welcome back, {{ Auth::user()->username }}!</p>
                <form method="post" action="{{ route('auth.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link ms-2">Logout</button>
                </form>
            @endif
          </div>
        </div>
    </nav>

    

    <div class="container mt-3 mb-3">
        <div class="row">
            {{--
            <div class="col-3">
                <ul class="nav flex-column">
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('album.index') }}">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('eloquent_album.index') }}">Albums (Eloquent)</a>
                    </li>

                    
                    @if (Auth::check()) 
                        <li class="nav-item">
                            <a href="{{ route('profile.index') }}" class="nav-link">Profile</a>
                        </li>
                        <li>
                            <form method="post" action="{{ route('auth.logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('registration.index') }}" class="nav-link">Register</a>
                         </li>
                         <li class="nav-item">
                            <a href="{{ route('auth.loginForm') }}" class="nav-link">Login</a>
                         </li>
                    @endif 
                </ul>
            </div> --}}
            <div class="col-12">
                {{-- <header>
                    <h2>@yield('title')</h2>
                </header> --}}
                
                <main>
                    {{-- @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif --}}
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>