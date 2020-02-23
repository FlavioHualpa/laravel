<?php

use App\Testimony;
use Illuminate\Database\Seeder;

class TestimoniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimony::create([
            'user_id' => 1,
            'body' => 'Un pequeño río llamado Duden fluye por su lugar y le suministra los regelialia necesarios. Es un país paradisíaco, en el que las partes asadas de las frases vuelan en tu boca.'
        ]);
        
        Testimony::create([
            'user_id' => 2,
            'body' => 'Un pequeño río llamado Duden fluye por su lugar y le suministra los regelialia necesarios. Es un país paradisíaco, en el que las partes asadas de las frases vuelan en tu boca.'
        ]);

        Testimony::create([
            'user_id' => 3,
            'body' => 'Un pequeño río llamado Duden fluye por su lugar y le suministra los regelialia necesarios. Es un país paradisíaco, en el que las partes asadas de las frases vuelan en tu boca.'
        ]);

        Testimony::create([
            'user_id' => 4,
            'body' => 'Un pequeño río llamado Duden fluye por su lugar y le suministra los regelialia necesarios. Es un país paradisíaco, en el que las partes asadas de las frases vuelan en tu boca.'
        ]);
    }
}
