<?php

use App\Room;
use App\RoomType;
use Illuminate\Database\Seeder;

const ROOM_TYPES_NUM = 6;
const FLOORS_NUM = 10;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= FLOORS_NUM; $i++) {
            for($j = 1; $j <= ROOM_TYPES_NUM; $j++) {
                Room::create([
                    'floor_num' => $i,
                    'room_type_id' => $j,
                ]);
            }
        }
    }
}
