<?php

namespace App;

use DB;
use App\Image;
use App\Room;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
        'name',
        'stars',
        'price',
        'description',
        'passengers',
        'beds',
        'size',
        'view',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function formattedPrice()
    {
        return '$ ' . number_format($this->price, 0, ',', '.');
    }

    public function available($date = null)
    {
        if (empty($date)) {
            $date = \Carbon\Carbon::today();
        }

        $reserved = DB::table('reservations')
            ->where([
                ['check_in', '<=', $date],
                ['check_out', '>', $date]
            ])
            ->pluck('room_id');

        return Room::where('room_type_id', $this->id)
            ->whereNotIn('id', $reserved)
            ->count();
    }
}
