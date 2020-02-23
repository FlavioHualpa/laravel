<?php

use App\Job;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create( ['name' => 'Hombre de negocios'] );
        Job::create( ['name' => 'Architect'] );
        Job::create( ['name' => 'Lawyer'] );
        Job::create( ['name' => 'Politician'] );
        Job::create( ['name' => 'Painter'] );
        Job::create( ['name' => 'Software Engineer'] );
        Job::create( ['name' => 'Electronic Engineer'] );
        Job::create( ['name' => 'Chemist'] );
        Job::create( ['name' => 'Teacher'] );
        Job::create( ['name' => 'Actor'] );
        Job::create( ['name' => 'Writer'] );
        Job::create( ['name' => 'Singer'] );
        Job::create( ['name' => 'Plastic Artist'] );
        Job::create( ['name' => 'Taylor'] );
        Job::create( ['name' => 'Designer'] );
        Job::create( ['name' => 'Musician'] );
    }
}
