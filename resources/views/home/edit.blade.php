<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.css')

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->

      <!-- end loader -->
      <!-- header -->
      <header>
        <!-- header inner -->
        <div class="header">
           <div class="container">
              <div class="row">
                 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                       <div class="center-desk">
                          <div class="logo">
                             <a href="{{url('/')}}"><img src="images/logo2.jpg" alt="#" /></a>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                       </button>
                       <div class="collapse navbar-collapse" id="navbarsExample04">
                          <ul class="navbar-nav mr-auto">
                             <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}">Home</a>
                             </li>
        
        
        
                             @if (Route::has('login'))
        
               @auth
               <li class="nav-item">
                <ul class="navbar-nav" >
                   <li class="nav-item" style="padding-right: 10px;">
                      <a class="nav-link" href="{{route('profile.show')}}">{{ Auth::user()->name }}</a>
                   </li>
                   <li class="nav-item">
                       <form action="{{ route('logout') }}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-danger">Logout</button>
                       </form>
                   </li>
               </ul>
               
             </li>
                @else
                <li class="nav-item" style="padding-right: 10px;">
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
      <!-- end header inner -->
      <!-- end header -->

      <!-- form section -->
      <section class="container mt-5">
         <div class="row">
            <div class="col-md-8 offset-md-2">
               <h2>Update Profile</h2>
               <form action="{{route('profile.update')}}" method="Post" enctype="multipart/form-data">
                @method("put")
                      @csrf
                  <div class="mb-3">
                     <label for="name" class="form-label">Name</label>
                     <input type="text" class="form-control" id="name" name="name" value="{{old('username', Auth::user()->name)}}"  required>
                     @error('name')
                        <div>{{$message}}</div>
                     @enderror
                    </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" name="email" value="{{old('username', Auth::user()->email)}}" required>
                     @error('email')
                     <div>{{$message}}</div>
                  @enderror
                    </div>
                  <div class="mb-3">
                     <label for="phone" class="form-label">Phone</label>
                     <input type="number" class="form-control" id="phone" name="phone" value="{{old('username', Auth::user()->phone)}}" required></input>
                     @error('phone')
                     <div>{{$message}}</div>
                  @enderror
                    </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
         </div>
      </section>
      <!-- end form section -->

   </body>
</html>