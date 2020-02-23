<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Gerald',
            'last_name' => 'Hodson',
            'job_id' => 1,
            'id_num' => rand(40355812, 99000000),
            'email' => 'ghodson@test.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'first_name' => 'Justine',
            'last_name' => 'Altman',
            'job_id' => 2,
            'id_num' => rand(40355812, 99000000),
            'email' => 'j_altman@test.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'first_name' => 'Peter',
            'last_name' => 'Ambudsier',
            'job_id' => 3,
            'id_num' => rand(40355812, 99000000),
            'email' => 'p_ambudsier@test.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'first_name' => 'Lisa',
            'last_name' => 'Zaffron',
            'job_id' => 4,
            'id_num' => rand(40355812, 99000000),
            'email' => 'lzaffron@test.com',
            'password' => bcrypt('password')
        ]);
    }
}
