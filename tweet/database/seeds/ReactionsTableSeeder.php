<?php

use Illuminate\Database\Seeder;

class ReactionsTableSeeder extends Seeder
{
   /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
      DB::table('reactions')
         ->insert([
            'name' => 'Me gusta',
            'emoji' => '👍🏽',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

      DB::table('reactions')
         ->insert([
            'name' => 'Me alegra',
            'emoji' => '😄',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

      DB::table('reactions')
         ->insert([
            'name' => 'Me emociona',
            'emoji' => '😢',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

      DB::table('reactions')
         ->insert([
            'name' => 'Me da igual',
            'emoji' => '😐',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

      DB::table('reactions')
         ->insert([
            'name' => 'Me aburre',
            'emoji' => '🥱',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

      DB::table('reactions')
         ->insert([
            'name' => 'Me entristece',
            'emoji' => '😩',
            'created_at' => now(),
            'updated_at' => now(),
         ]);
   }
}
