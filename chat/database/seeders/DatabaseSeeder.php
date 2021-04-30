<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Channel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'María',
            'email' => 'maria@mail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Flavio',
            'email' => 'flavio@mail.com',
            'password' => Hash::make('password')
        ]);

        Channel::create(['name' => 'General']);
        Channel::create(['name' => 'Viajes']);
    }
}
