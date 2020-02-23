<?php

use App\Image;
use App\Menu;
use App\RoomType;
use App\User;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'url' => 'img/users/person_1.jpg',
            'imageable_id' => 1,
            'imageable_type' => User::class,
        ]);

        Image::create([
            'url' => 'img/users/person_2.jpg',
            'imageable_id' => 2,
            'imageable_type' => User::class,
        ]);

        Image::create([
            'url' => 'img/users/person_3.jpg',
            'imageable_id' => 3,
            'imageable_type' => User::class,
        ]);

        Image::create([
            'url' => 'img/users/person_4.jpg',
            'imageable_id' => 4,
            'imageable_type' => User::class,
        ]);

        Image::create([
            'url' => 'img/rooms/room-6.jpg',
            'imageable_id' => 1,
            'imageable_type' => RoomType::class,
        ]);

        Image::create([
            'url' => 'img/rooms/room-1.jpg',
            'imageable_id' => 2,
            'imageable_type' => RoomType::class,
        ]);

        Image::create([
            'url' => 'img/rooms/room-3.jpg',
            'imageable_id' => 3,
            'imageable_type' => RoomType::class,
        ]);

        Image::create([
            'url' => 'img/rooms/room-5.jpg',
            'imageable_id' => 4,
            'imageable_type' => RoomType::class,
        ]);

        Image::create([
            'url' => 'img/rooms/room-2.jpg',
            'imageable_id' => 5,
            'imageable_type' => RoomType::class,
        ]);

        Image::create([
            'url' => 'img/rooms/room-4.jpg',
            'imageable_id' => 6,
            'imageable_type' => RoomType::class,
        ]);

        Image::create([
            'url' => 'img/menus/menu-1.jpg',
            'imageable_id' => 1,
            'imageable_type' => Menu::class,
        ]);

        Image::create([
            'url' => 'img/menus/menu-2.jpg',
            'imageable_id' => 2,
            'imageable_type' => Menu::class,
        ]);

        Image::create([
            'url' => 'img/menus/menu-3.jpg',
            'imageable_id' => 3,
            'imageable_type' => Menu::class,
        ]);

        Image::create([
            'url' => 'img/menus/menu-4.jpg',
            'imageable_id' => 4,
            'imageable_type' => Menu::class,
        ]);

        Image::create([
            'url' => 'img/menus/menu-5.jpg',
            'imageable_id' => 5,
            'imageable_type' => Menu::class,
        ]);

        Image::create([
            'url' => 'img/menus/menu-6.jpg',
            'imageable_id' => 6,
            'imageable_type' => Menu::class,
        ]);

        Image::create([
            'url' => 'img/menus/menu-7.jpg',
            'imageable_id' => 7,
            'imageable_type' => Menu::class,
        ]);

        Image::create([
            'url' => 'img/menus/menu-8.jpg',
            'imageable_id' => 8,
            'imageable_type' => Menu::class,
        ]);

        Image::create([
            'url' => 'img/menus/menu-9.jpg',
            'imageable_id' => 9,
            'imageable_type' => Menu::class,
        ]);

        Image::create([
            'url' => 'img/menus/menu-9.jpg',
            'imageable_id' => 10,
            'imageable_type' => Menu::class,
        ]);
    }
}
