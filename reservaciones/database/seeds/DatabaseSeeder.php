<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JobsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(RoomTypesSeeder::class);
        $this->call(TestimoniesSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(RoomsSeeder::class);
        $this->call(MenusSeeder::class);
    }
}
