<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Contact;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view ('home.room_details', compact('room'));
    }

    public function __construct()
    {
        $this->middleware('auth');
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


    
    

    
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended($this->redirectPath());
    }
}