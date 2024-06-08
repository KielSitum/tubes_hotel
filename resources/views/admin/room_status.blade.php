<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type="text/css">
     .table_deg {
                border: 2px solid white;
                margin: auto;
                width: 100%;
                text-align: center;
                margin-top: 40px;
                table-layout: fixed; /* Added this */
                word-wrap: break-word; /* Added this */
            }
    
            .th_deg {
                background-color: skyblue;
                padding: 8px;
            }
    
            tr {
                border: 3px solid white;
            }
    
            td {
                padding: 10px;
                word-break: break-word; /* Added this */
            }
    
            img {
                max-width: 100%; /* Ensure images fit within their cells */
            }
    
            .btn {
                white-space: nowrap; /* Ensure buttons don't wrap text */
            }
    
            .btn-container {
                display: flex;
                flex-direction: column;
                gap: 5px; /* Added this for spacing between buttons */
            }

            /* Warna status */
            .status-waiting {
                color: yellow; /* Warna hijau untuk status "Waiting" */
            }

            .status-using {
                color: green; /* Warna biru untuk status "Using" */
            }

            .status-checkout {
                color: blue; /* Warna merah untuk status "Check-out" */
            }

            .status-rejected {
                color: red; /* Warna merah untuk status "Rejected" */
            }

            .status-pending {
                color: rgb(255, 123, 0); /* Warna merah untuk status "Rejected" */
            }

            .status-approve {
                color: skyblue; /* Warna biru untuk status "Approve" */
            }
    
    </style>
</head>
<body>
    @include('admin.header')

    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
    <h1>Room Status</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <table class="table_deg">
        <thead>
            <tr>
                <th class="th_deg">Room ID</th>
                <th class="th_deg">Room Title</th>
                <th class="th_deg">Customer Name</th>
                <th class="th_deg">Email</th>
                <th class="th_deg">Phone</th>
                <th class="th_deg">Start Date</th>
                <th class="th_deg">End Date</th>
                <th class="th_deg">Status</th>
                <th class="th_deg">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $booking)
                <tr>
                    <td>{{ $booking->room_id }}</td>
                    <td>{{ $booking->room->room_title }}</td>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->phone }}</td>
                    <td>{{ $booking->start_date }}</td>
                    <td>{{ $booking->end_date }}</td>
                    <td class="@if($booking->status == 'Waiting') status-waiting @elseif($booking->status == 'Using') status-using @elseif($booking->status == 'Check-out') status-checkout @elseif($booking->status == 'Rejected') status-rejected @elseif($booking->status == 'Approve') status-approve @elseif($booking->status == 'Pending') status-pending @endif"  >{{ $booking->status }}</td>
                    <td>
                        <form action="{{ route('room_status.update', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status">
                                <option value="Pending">Pending</option>
                                <option value="Waiting">Waiting</option>
                                <option value="Using">Using</option>
                                <option value="Check-out">Check Out</option>
                            </select>
                            <button type="submit" style="background-color:skyblue; color:white">Change Status</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

            </div>
        </div>
    </div>

    @include('admin.footer')
</body>
</html>
