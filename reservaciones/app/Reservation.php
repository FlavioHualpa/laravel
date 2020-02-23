<?php

namespace App;

use App\Room;
use App\RoomType;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function nights()
    {
        if ($this->check_in && $this->check_out) {
            return $this->check_in->diffInDays($this->check_out);
        }

        return null;
    }

    public function pricePerNight()
    {
        if ($this->room_type_id) {
            $rt = RoomType::find($this->room_type_id);

            if ($rt) {
                return $rt->price;
            }
        }

        return null;
    }

    public function totalPrice()
    {
        return $this->nights() * $this->pricePerNight();
    }

    public function description()
    {
        if ($this->room_id) {
            $roomNumber = Room::find($this->room_id)->roomNumber();

            return "Habitación $roomNumber, " .
                $this->nights() . " noches, del " .
                $this->check_in->format('d-m-Y') . " al " .
                $this->check_out->format('d-m-Y') . ". " .
                "Precio total $" . number_format(
                    $this->totalPrice(), 2, ',', '.'
                );
        }

        return null;
    }
}
