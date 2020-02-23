<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Room;
use App\RoomType;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\BookRoomRequest;
use App\Mail\ReservationDetails;
use Barryvdh\DomPDF\Facade as PDF;

class ReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function index()
    {
        $rooms = Room::all();

        $colors = [ '--blue', '--indigo', '--pink', '--red', '--orange', '--yellow', '--green', '--cyan' ];

        return view('hotel.reservations')
            ->with([
                'rooms' => $rooms,
                'colors' => $colors,
                'startingDate' => Carbon::create(2019, 12, 1)
            ]);
    }

    public function choose(BookRoomRequest $request)
    {
        session([
            'redir-after-auth' => true
        ]);

        $rooms = Room::available(
            $request->input('check_in'),
            $request->input('check_out'),
            $request->input('room_type_id')
        );

        $roomType = Room::find($request->input('room_type_id'));

        $reservation = new Reservation;
        $reservation->check_in = Carbon::make($request->input('check_in'));
        $reservation->check_out = Carbon::make($request->input('check_out'));
        $reservation->passengers = $request->input('passengers');
        $reservation->room_type_id = $roomType->id;
        $reservation->room_name = $roomType->name;
        $reservation->room_view = $roomType->view;
        $reservation->nights = $reservation->check_in->diffInDays($reservation->check_out);
        $reservation->total_price = $reservation->nights * $roomType->price;

        if ($rooms->count() > 0)
        {
            return view('hotel.confirm')
                ->with([
                    'status' => 'must-pick-room',
                    'rooms' => $rooms,
                    'reservation' => $reservation
                ]);
        }

        $options = Room::findOtherPossibleDates(
            $request->input('check_in'),
            $request->input('check_out'),
            $request->input('room_type_id'),
            $request->input('passengers')
        );

        if (count($options) > 0)
        {
            return view('hotel.confirm')
                ->with([
                    'status' => 'must-change-dates',
                    'options' => $options,
                    'reservation' => $reservation
                ]);
        }
    }

    public function prepare(Request $request)
    {
        session([
            'reservation-data' => request()->input('reservation-data')
        ]);

        return redirect()->route('room.book');
    }

    public function store(Request $request)
    {
        // dd(session('reservation-data'));
        
        $jsonData = session('reservation-data');
        $reservData = json_decode($jsonData);

        $reservData->check_in = Carbon::make($reservData->check_in);
        $reservData->check_out = Carbon::make($reservData->check_out);

        $invoice = new Invoice;
        $invoice->save();

        $room = Room::find($reservData->room_id);

        $room->reservations()->attach(
            auth()->id(),  // el id del usuario
            [
                'check_in' => $reservData->check_in,
                'check_out' => $reservData->check_out,
                'invoice_id' => $invoice->id
            ]
        );

        $user = auth()->user();
        $user->name = $user->fullName();

        $pdfPath = public_path('pdf/hhl-invoice-' . $invoice->branch . '-' . $invoice->number . '.pdf');

        $pdf = PDF::loadView('hotel.invoice', [
            'user' => $user,
            'reservation' => $reservData,
            'invoice' => $invoice ])
            ->save($pdfPath);

        Mail::to($user)
            ->send(new ReservationDetails($user, $reservData, $pdfPath));

        session()->remove('redir-after-auth');
        session()->remove('reservation-data');

        return view('hotel.book')
            ->with([
                'user' => $user,
                'reservation' => $reservData
            ]);
    }
}
