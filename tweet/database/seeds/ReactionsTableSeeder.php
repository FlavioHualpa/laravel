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
            'code' => '',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

      DB::table('reactions')
         ->insert([
            'name' => 'Me alegra',
            'code' => '',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

      DB::table('reactions')
         ->insert([
            'name' => 'Me emociona',
            'code' => '',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

      DB::table('reactions')
         ->insert([
            'name' => 'Me da igual',
            'code' => '',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

      DB::table('reactions')
         ->insert([
            'name' => 'Me aburre',
            'code' => '',
            'created_at' => now(),
            'updated_at' => now(),
         ]);

      DB::table('reactions')
         ->insert([
            'name' => 'Me entristece',
            'code' => '',
            'created_at' => now(),
            'updated_at' => now(),
         ]);
   }
}
