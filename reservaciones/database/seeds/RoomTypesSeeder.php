<?php

use Illuminate\Database\Seeder;
use App\RoomType;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::create([
            'name' => 'Real',
            'stars' => 5,
            'price' => 1249,
            'description' => 'Cuando llegó a las primeras colinas de las Montañas Itálicas, tuvo una última vista del horizonte de su ciudad natal Bookmarksgrove, el titular de Alphabet Village y el sublínea de su propia carretera, Line Lane. Una piadosa pregunta retórica le pasó por encima de la mejilla, y luego continuó su camino.',
            'passengers' => 6,
            'beds' => 3,
            'size' => 120,
            'view' => 'al mar',
        ]);

        RoomType::create([
            'name' => 'Suite',
            'stars' => 5,
            'price' => 999,
            'description' => 'Cuando llegó a las primeras colinas de las Montañas Itálicas, tuvo una última vista del horizonte de su ciudad natal Bookmarksgrove, el titular de Alphabet Village y el sublínea de su propia carretera, Line Lane. Una piadosa pregunta retórica le pasó por encima de la mejilla, y luego continuó su camino.',
            'passengers' => 5,
            'beds' => 3,
            'size' => 90,
            'view' => 'al mar',
        ]);

        RoomType::create([
            'name' => 'Deluxe',
            'stars' => 4,
            'price' => 749,
            'description' => 'Cuando llegó a las primeras colinas de las Montañas Itálicas, tuvo una última vista del horizonte de su ciudad natal Bookmarksgrove, el titular de Alphabet Village y el sublínea de su propia carretera, Line Lane. Una piadosa pregunta retórica le pasó por encima de la mejilla, y luego continuó su camino.',
            'passengers' => 4,
            'beds' => 2,
            'size' => 80,
            'view' => 'a la playa',
        ]);

        RoomType::create([
            'name' => 'Superior',
            'stars' => 4,
            'price' => 549,
            'description' => 'Cuando llegó a las primeras colinas de las Montañas Itálicas, tuvo una última vista del horizonte de su ciudad natal Bookmarksgrove, el titular de Alphabet Village y el sublínea de su propia carretera, Line Lane. Una piadosa pregunta retórica le pasó por encima de la mejilla, y luego continuó su camino.',
            'passengers' => 4,
            'beds' => 2,
            'size' => 70,
            'view' => 'a la playa',
        ]);

        RoomType::create([
            'name' => 'Familiar',
            'stars' => 3,
            'price' => 429,
            'description' => 'Cuando llegó a las primeras colinas de las Montañas Itálicas, tuvo una última vista del horizonte de su ciudad natal Bookmarksgrove, el titular de Alphabet Village y el sublínea de su propia carretera, Line Lane. Una piadosa pregunta retórica le pasó por encima de la mejilla, y luego continuó su camino.',
            'passengers' => 4,
            'beds' => 2,
            'size' => 55,
            'view' => 'al parque interno',
        ]);

        RoomType::create([
            'name' => 'Clásica',
            'stars' => 3,
            'price' => 319,
            'description' => 'Cuando llegó a las primeras colinas de las Montañas Itálicas, tuvo una última vista del horizonte de su ciudad natal Bookmarksgrove, el titular de Alphabet Village y el sublínea de su propia carretera, Line Lane. Una piadosa pregunta retórica le pasó por encima de la mejilla, y luego continuó su camino.',
            'passengers' => 2,
            'beds' => 1,
            'size' => 45,
            'view' => 'al parque interno',
        ]);
    }
}
