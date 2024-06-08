<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@include('home.css')

<style type="text/css">

    label 
    {
        display: inline-block;
        width: 200px;
    }

    input 
    {
        width: 100%;
    }
</style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
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
              <a class="nav-link" href="{{route('profile.edit')}}">{{ Auth::user()->name }}</a>
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
      <!-- banner -->





<div id="our_room" class="content_section">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Our Room</h2>
                <p>Room Details</p>
             </div>
          </div>
       </div>
       <div class="row">
      

          <div class="col-md-8">
             <div id="serv_hover"  class="room">
                <div style="padding:20px" class="room_img">
                   <img style="height: 300px; width:800px" src="/room/{{$room->image}}" alt="#"/>
                </div>
                <div class="bed_room">
                   <h1><u>{{$room->room_title}}</u></h1>

                   <p style="padding: 12px">{{$room->description}}</p>

                   <h4 style="padding: 12px">FREE WIFI : {{$room->wifi}}</h4>

                   <h4 style="padding: 12px">ROOM TYPE : {{$room->room_type}}</h4>

                   <h4 style="padding: 12px">PRICE : {{$room->price}}</h3>
                </div>
             </div>
          </div>

          <div class="col-md-4">
            <h1 style="font-size:40px!important;">Book room</h1>

            <div>
            @if(session()->has('message'))

            <div class="alert alert-success">

               <button type="button" class="close" data-bs-dismiss="alert">X</button>

               {{session()->get('message')}}

            </div>

            @endif
         </div>

            @if($errors)

            @foreach($errors->all() as $errors)

            <li style="color:red">
                {{$errors}}
            </li>

            @endforeach

            @endif

            <form action="{{url('add_booking',$room->id)}}" method="Post">

                @csrf

          <div>
            <label>Name</label>
            <input type="text" name="name" 
            value="@auth{{ Auth::user()->name }}@endauth" readonly
            >
          </div>
          <div>
            <label>Email</label>
            <input type="email" name="email"
            value="@auth{{ Auth::user()->email }}@endauth" readonly
            >
          </div>
          <div>
            <label>Phone</label>
            <input type="number" name="phone"
            value="@auth{{ Auth::user()->phone }}@endauth" readonly
            >
          </div>
          <div>
            <label>Start Date</label>
            <input type="date" name="startDate" id="startDate">
          </div>
          <div>
            <label>End Date</label>
            <input type="date" name="endDate" id="endDate">
          </div>
          <div style="padding-top: 20px;">
            <input type="submit" style="background-color: skyblue;" class="btn btn-primary" value="Book Room">
          </div>

          </form>

          </div>
         
         
       </div>
    </div>
 </div>











      <!--  footer -->
@include('home.footer')

<script type="text/javascript">
    $(function(){

var dtToday = new Date();

var month = dtToday.getMonth() + 1;

var day = dtToday.getDate();

var year = dtToday.getFullYear();

if(month < 10)

    month = '0' + month.toString();

if(day < 10)

 day = '0' + day.toString();

var maxDate = year + '-' + month + '-' + day;

$('#startDate').attr('min', maxDate);
$('#endDate').attr('min', maxDate);

});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

   </body>
</html>