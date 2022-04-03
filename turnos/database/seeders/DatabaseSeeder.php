<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Professional::factory(20)->create();
        \App\Models\MedicalCenter::factory(12)->create();
        \App\Models\Affiliate::factory(200)->create();

        $this->SeedSpecializations();
        $this->SeedProfessionalSpecializations();
        $this->SeedAvailability();
    }

    public function SeedSpecializations()
    {
        $specializations = [
            ['name' => 'Pediatria'],
            ['name' => 'Dermatología'],
            ['name' => 'Gastroenterología'],
            ['name' => 'Cardiología'],
            ['name' => 'Otorrinolaringología'],
            ['name' => 'Oftalmología'],
            ['name' => 'Urología'],
            ['name' => 'Endocrinología'],
            ['name' => 'Traumatología'],
            ['name' => 'Kinesiología'],
            ['name' => 'Psicología'],
            ['name' => 'Ginecología'],
            ['name' => 'Neurología'],
            ['name' => 'Reumatología'],
        ];

        foreach ($specializations as $sp)
            \App\Models\Specialization::create(['name' => $sp['name']]);
    }

    public function SeedProfessionalSpecializations()
    {
        foreach (\App\Models\Professional::pluck('id') as $prof)
            foreach(\App\Models\Specialization::all()->random(rand(1, 2))->pluck('id') as $spec)
                \App\Models\ProfessionalSpecialization::create([
                    'professional_id' => $prof,
                    'specialization_id' => $spec
                ]);
    }

    public function SeedAvailability()
    {
        $one = collect([
            [ 1, 2, 3, 4 ],
            [ 2, 3, 4, 5 ],
            [ 1, 3, 5 ],
            [ 2, 4, 6 ],
        ]);

        $two = collect([
            [
                [ 1, 2 ],
                [ 3, 4, 5 ],
            ],
            [
                [ 1, 2, 3 ],
                [ 4, 5 ],
            ],
            [
                [ 1, 3, 5 ],
                [ 2, 4 ],
            ],
            [
                [ 2, 4 ],
                [ 1, 3, 5 ],
            ],
        ]);

        foreach (\App\Models\Professional::inRandomOrder()->get() as $professional)
        {
            $specializations = $professional->specializations;

            if ($specializations->count() == 1)
            {
                $weekDays = $one->random();
                $mc = \App\Models\MedicalCenter::inRandomOrder()->take(1)->get();

                foreach ($weekDays as $weekDay)
                {
                    $fromHour = Carbon::make(rand(8, 12) . ':00');
                    $toHour = $fromHour->copy()->addHours(rand(4, 8));

                    while ($fromHour <= $toHour)
                    {
                        $specializations[0]->pivot->medicalCenters()->attach(
                            $mc[0]->id, [
                            'week_day' => $weekDay,
                            'time' => $fromHour,
                        ]);
                        $fromHour->addMinutes(15);
                    }
                }
            }
            else
            {
                $weekDays = $two->random();
                $mc = \App\Models\MedicalCenter::inRandomOrder()->take(2)->get();

                foreach ($weekDays[0] as $weekDay)
                {
                    $fromHour = Carbon::make(rand(8, 12) . ':00');
                    $toHour = $fromHour->copy()->addHours(rand(4, 8));

                    while ($fromHour <= $toHour)
                    {
                        $specializations[0]->pivot->medicalCenters()->attach(
                            $mc[0]->id, [
                            'week_day' => $weekDay,
                            'time' => $fromHour,
                        ]);
                        $fromHour->addMinutes(15);
                    }
                }
                
                foreach ($weekDays[1] as $weekDay)
                {
                    $fromHour = Carbon::make(rand(8, 12) . ':00');
                    $toHour = $fromHour->copy()->addHours(rand(4, 8));

                    while ($fromHour <= $toHour)
                    {
                        $specializations[1]->pivot->medicalCenters()->attach(
                            $mc[1]->id, [
                            'week_day' => $weekDay,
                            'time' => $fromHour,
                        ]);
                        $fromHour->addMinutes(15);
                    }
                }
            }
        }
    }
}
