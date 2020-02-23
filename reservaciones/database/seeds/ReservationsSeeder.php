<?php

use App\Room;
use Illuminate\Database\Seeder;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dates = [];

        for ($i = 0; $i < 25; $i++)
        {
            $rooms = Room::inRandomOrder()->get();

            foreach ($rooms as $room)
            {
                $id = $room->id;

                if (isset($dates[$id])) {
                    $checkIn = $dates[$id];
                    $checkIn->addDays(rand(0, 10));
                }
                else {
                    $checkIn = Carbon\Carbon::create(2019, 8, rand(1, 20));
                }

                $checkOut = $checkIn->copy()->addDays(rand(2, 20));

                $room->reservations()->attach(
                    rand(1, 4), [
                        'check_in' => $checkIn,
                        'check_out' => $checkOut,
                    ]
                );

                $dates[$id] = $checkOut;
            }
        }
    }
}
