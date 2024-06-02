<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body.main-layout {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .logo img {
            max-height: 60px;
        }
        .navbar-nav .nav-item {
            margin-left: 15px;
        }
        .navbar-nav .btn {
            padding: 0.375rem 0.75rem;
        }
        .form-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-section h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }
        .form-section .form-label {
            font-weight: bold;
            color: #555;
        }
        .form-section .form-control {
            border-radius: 5px;
        }
        .form-section .btn {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body class="main-layout">
    <!-- header -->
    <header>
        <div class="header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 logo_section">
                        <div class="full text-center">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="images/logo2.jpg" alt="Logo" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/')}}">Home</a>
                                    </li>
                                    @if (Route::has('login'))
                                        @auth
                                            <li class="nav-item dropdown">
                                                <a class="nav-link disabled" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ Auth::user()->name }}
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                                    <li><a class="dropdown-item" href="{{route('profile.show')}}">Profile</a></li>
                                                    <li>
                                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item">Logout</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="btn btn-success" href="{{url('login')}}">Login</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="btn btn-primary" href="{{url('register')}}">Register</a>
                                                </li>
                                            @endif
                                        @endauth
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- form section -->
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="form-section">
                    <h2>Update Profile</h2>
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}" required>
                            @error('phone')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end form section -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybYF6Z5R8bQzWvAUOU6xW+4tK6PiYwodWb7Pj0cvWw7SW8g4j" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BOo9GIeRkEXWV/U/Yd9eohapIRpvhtK41zt+7Jp2yb4p/srtF5VzO/G4F06VBa3a" crossorigin="anonymous"></script>
</body>
</html>
