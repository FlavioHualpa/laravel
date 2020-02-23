<?php

namespace App;

use DB;
use App\RoomType;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_type_id',
        'floor_num'
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function roomNumber()
    {
        return $this->floor_num * 100 + $this->room_type_id;
    }

    public function reservations()
    {
        return $this
            ->belongsToMany(User::class, 'reservations')
            ->withPivot( ['check_in', 'check_out', 'invoice_id' ] )
            ->withTimeStamps();
    }

    //
    // available devuelve las habitaciones disponibles
    // entre las fechas pasadas como argumentos
    // opcionalmente filtra a un tipo de habitación en particular
    //
    public static function available($checkIn, $checkOut, $roomTypeId = null)
    {
        $reserved = DB::table('reservations')
            ->where([
                ['check_in', '<', $checkOut],
                ['check_out', '>', $checkIn]
            ])
            ->pluck('room_id');

        return $roomTypeId ?

            self::whereNotIn('id', $reserved)
                ->where('room_type_id', $roomTypeId)
                ->get() :
                
            self::whereNotIn('id', $reserved)
                ->get();

        // return DB::table('reservations')
        //     ->where('check_in', '>', $checkOut)
        //     ->orWhere('check_out', '<=', $checkIn)
        //     ->get();
    }

    public static function findOtherPossibleDates($check_in, $check_out, $room_type_id, $passengers)
    {
        $rooms = self::where('room_type_id', $room_type_id)
            ->get();

        $checkIn = Carbon::create($check_in);
        $checkOut = Carbon::create($check_out);
        $reservDays = $checkIn->diffInDays($checkOut);
        $options = [];

        foreach ($rooms as $room)
        {
            $reservations = $room->reservations()
                ->where('check_out', '>', $check_in)
                ->orderBy('check_in')
                ->get();
            
            $resCount = $reservations->count();
            $roomNum = $room->roomNumber();

            for ($i = 0; $i < $resCount; $i++)
            {
                $prevCheckOut = Carbon::create($reservations[$i]->pivot->check_out);

                if ($prevCheckOut >= $checkIn)
                {
                    $yourCheckIn = $prevCheckOut;

                    if ($i >= $resCount)
                    {
                        $yourCheckOut = $yourCheckIn->copy()->addDays($reservDays);
                    }
                    else
                    {
                        $nextCheckIn = Carbon::create($reservations[$i + 1]->pivot->check_in);

                        if ($prevCheckOut == $nextCheckIn)
                            continue;
                        
                        $inBetweenDays= $prevCheckOut->diffInDays($nextCheckIn);
                        
                        if ($reservDays > $inBetweenDays)
                        {
                            $yourCheckOut = $yourCheckIn->copy()->addDays($inBetweenDays);
                        }
                        else
                        {
                            $yourCheckOut = $yourCheckIn->copy()->addDays($reservDays);
                        }
                    }

                    $roomType = RoomType::find($room_type_id);

                    $reservation = new Reservation;
                    $reservation->check_in = $yourCheckIn;
                    $reservation->check_out = $yourCheckOut;
                    $reservation->room_id = $room->id;
                    $reservation->room_type_id = $room_type_id;
                    $reservation->room_number = $room->roomNumber();
                    $reservation->room_name = $roomType->name;
                    $reservation->room_view = $roomType->view;
                    $reservation->nights = $yourCheckIn->diffInDays($yourCheckOut);
                    $reservation->total_price = $reservation->nights * $roomType->price;
                    $reservation->passengers = $passengers;

                    $options[$roomNum][] = $reservation;

                    if (count($options[$roomNum]) == 2)
                        break;
                }
            }
        }

        return $options;
    }
}
