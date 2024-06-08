<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Contact;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Dompdf\Dompdf;

use Dompdf\Options;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view ('home.room_details', compact('room'));
    }

    public function __construct()
    {
        $this->middleware('auth')->except('contact');
    }

    // Method untuk menampilkan daftar pemesanan dan detail pemesanan
    public function index($id = null)
    {
        $userId = Auth::id();
        if ($id) {
            $booking = Booking::where('user_id', $userId)->find($id);

            if (!$booking) {
                abort(403); // Jika pengguna mencoba mengakses pemesanan yang bukan miliknya
            }

            return view('home.history', compact('booking'));
        }

        $bookings = Booking::where('user_id', $userId)->get();
        return view('home.history', compact('bookings'));
    }

    public function cancel_booking($id)
    {
        $bookings = Booking::find($id);
        $bookings->delete();
        return redirect()->back();
    }

    public function add_booking(Request $request, $id)
    {

        $request->validate([

            'startDate' => 'required | date',
            'endDate' => 'date|after:startDate',

        ]);
        $data = new Booking;

        $data->room_id = $id;

        $user_id = Auth::id();
        $data->user_id = $user_id;

        $data->name = $request->name;
        
        $data->email = $request->email;

        $data->phone = $request->phone;



        $startDate = $request->startDate;

        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
        ->where('start_date', '<=' , $endDate)
        ->where('end_date', '>=' , $startDate)->exists();

        if($isBooked)
        {
            return redirect()->back()->with('message','Kamar sudah dipesan, Silahkan coba dihari lain!!');
        }

        else
        {
            $data->start_date = $request->startDate;

            $data->end_date = $request->endDate;
    
            $data->save();
    
            return redirect()->back()->with('message','Kamar Berhasil Dipesan');
        }

    }

    public function contact(Request $request)
    {
        $contact = new Contact;

        $contact->name = $request->name;

        $contact->email = $request->email;

        $contact->phone = $request->phone;
        
        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('message','Pesan Terkirim');
    }

    
    public function downloadTicket($bookingId)
    {
        // Dapatkan data booking berdasarkan ID
        $booking = Booking::findOrFail($bookingId);
    
        // Setup DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
    
        $dompdf = new Dompdf($options);
    
        // Load HTML content
        $html = '<html><body>';
        $html .= '<center><h1><u>TICKET HOTEL</u></h1><center>';
        $html .= '<table border="1" style="border-collapse: collapse; width: 100%;">';
        $html .= '<tr>';
        $html .= '<th style="background-color: skyblue;">Name</th>';
        $html .= '<th style="background-color: skyblue;">Email</th>';
        $html .= '<th style="background-color: skyblue;">Phone</th>';
        $html .= '<th style="background-color: skyblue;">Check In</th>';
        $html .= '<th style="background-color: skyblue;">Check Out</th>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>' . $booking->name .  '</td>';
        $html .= '<td>' . $booking->email . '</td>';
        $html .= '<td>' . $booking->phone . '</td>';
        $html .= '<td>' . $booking->start_date .  ' 12:00 WIB</td>';
        $html .= '<td>' . $booking->end_date .  ' 12:00 WIB</td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '</body></html>';
    
        $dompdf->loadHtml($html);
    
        // Render PDF
        $dompdf->render();
    
        // Output PDF to browser or save to file
        return $dompdf->stream('ticket.pdf', array('Attachment' => 0));
    }
    
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended($this->redirectPath());
    }
}