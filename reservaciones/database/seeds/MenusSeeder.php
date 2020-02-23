<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name' => 'MILANESA DE TERNERA CON LINGUINE',
            'description' => 'Fina milanesa de ternera con linguine y parmesano. Acompañada de salsa pomodoro.',
            'price' => 285
        ]);

        Menu::create([
            'name' => 'CARPACCIO DI MANZO',
            'description' => 'Lonchas de buey con queso grana padano y rúcula con aceite de oliva y vinagreta de limón con tomate semiseco.',
            'price' => 196
        ]);

        Menu::create([
            'name' => 'LUBINA MEDITERRÁNEA',
            'description' => 'Lomo de lubina acompañado de verduras con vinagre de Módena, espinacas, quínoa y bulgur con salsa pesto y limón.',
            'price' => 359
        ]);

        Menu::create([
            'name' => 'ESCALOPAS DE BUEY',
            'description' => 'Escalopines de ternera con salsa de reducción de vino italiano, limón, tomate y tomillo fresco, con guarnición de linguine verde y blanco.',
            'price' => 316
        ]);

        Menu::create([
            'name' => 'RISOTTO FUNGHI TARTUFATO',
            'description' => 'Arroz cremoso de setas, botetus y trufa.',
            'price' => 292
        ]);

        Menu::create([
            'name' => 'TARTA DE QUESO',
            'description' => 'Cremosa tarta de queso con frutos rojos, acompañada de una nube de nata.',
            'price' => 184
        ]);

        Menu::create([
            'name' => 'COPA DE HELADO DE CHOCOLATE',
            'description' => 'Copa con base de crema de cacao con avellanas, helado de chocolate y vainilla, trozos de avellana y barquillo, nata y dados de chocolate crujiente.',
            'price' => 205
        ]);

        Menu::create([
            'name' => 'TARTA DE MANZANA',
            'description' => 'Tarta hojaldrada de manzana con caramelo y helado de vainilla.',
            'price' => 194
        ]);

        Menu::create([
            'name' => 'RAVIOLI INTEGRAL CON PESTO Y TOMATE',
            'description' => 'Raviolis con harina de espelta integral rellenos de queso ricotta y nueces con salsa de pesto, tomates cherry, queso parmesano y albahaca.',
            'price' => 328
        ]);

        Menu::create([
            'name' => 'LINGUINE VERDES FORESTALES',
            'description' => 'Con pollo en dados, mezcla de setas, tomate en dados, tomate semiseco, salsa prezzemolo, queso scamorza rallado y ajo picado.',
            'price' => 281
        ]);
    }
}
