<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@include('home.css')

<style type="text/css">
    .table_deg {
        border: 2px solid black;
        margin: auto;
        width: 100%;
        text-align: center;
        margin-top: 40px;
        table-layout: fixed; /* Added this */
        word-wrap: break-word; /* Added this */
    }

    .table-container {
    margin-bottom: 20px; /* Menambahkan jarak antara dua tabel */
}


    .th_deg {
        background-color: skyblue;
        padding: 8px;
        border: 2px solid black;
    }

    tr {
        border: 2px solid black;
    }

    td {
        padding: 10px;
        word-break: break-word; /* Added this */
        border: 2px solid black;
    }
</style>
   </head>
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
<div class="header">
    <div class="container">
       <div class="row">
        <div class="container">
            @if (isset($booking))
                <h1>Detail Pemesanan</h1>
                <p>Booking ID: {{ $booking->id }}</p>
                <p>User ID: {{ $booking->user_id }}</p>
                <p>Room: {{ $booking->room_name }}</p>
                <p>Date: {{ $booking->date }}</p>
                <!-- Tambahkan detail lain sesuai dengan data pemesanan -->
                <a href="{{ route('history.index') }}">Kembali ke Daftar Pemesanan</a>
            @else
                <h1>Your Order</h1>
                <ul>
                    @foreach ($bookings as $booking)
                    <table class = "mb-4">
                        <tr>
                            <th class="th_deg">Booking id</th>
                            <th class="th_deg">Customer Name</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Phone</th>
                            <th class="th_deg">Check In</th>
                            <th class="th_deg">Check Out</th>
                            <th class="th_deg">Status</th>
                            <th class="th_deg">Cancel Booking</th>
                            @if($booking->status == 'approve')
                            <th class="th_deg">Ticket</th>
                            @endif
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ route('history.show', $booking->id) }}">{{ $booking->id }}</a>
                            </td>
                            <td>
                                <a href="{{ route('history.show', $booking->id) }}">{{ $booking->name }}</a>
                            </td>
                            <td>
                                <a href="{{ route('history.show', $booking->id) }}">{{ $booking->email }}</a>
                            </td>
                            <td>
                                <a href="{{ route('history.show', $booking->id) }}">{{ $booking->phone }}</a>
                            </td>
                            <td>
                                <a href="{{ route('history.show', $booking->id) }}">{{ $booking->start_date }}</a>
                            </td>
                            <td>
                                <a href="{{ route('history.show', $booking->id) }}">{{ $booking->end_date }}</a>
                            </td>
                            <td>
                                <a href="{{ route('history.show', $booking->id) }}">{{ $booking->status }}</a>
                            </td>
                            <td>
                                <a class="btn btn-danger"href="{{url('cancel_booking',$booking->id)}} ">Cancel</a>
                            </td>
                            
                                @if($booking->status == 'approve')
                                <td>
                                    <a class="btn btn-primary" href="{{ route('ticket.download', $booking->id) }}">Download Ticket</a>
                                </td>
                                
                                    @endif
                            
                        </tr>
                    </table>
                    @endforeach
                </ul>
            @endif
        </div>
       </div>
    </div>
</div>