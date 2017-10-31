<?php

use Illuminate\Database\Seeder;
use App\Specialization;
class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialization::create([
                'strSpecDesc' => 'Engineer',
                'todelete' => 1,
                'status' => 1,
            ]);
        Specialization::create([
                'strSpecDesc' => 'Safety Officer',
                'todelete' => 1,
                'status' => 1,
            ]);
        Specialization::create([
                'strSpecDesc' => 'Welder',
                'todelete' => 1,
                'status' => 1,
            ]);
        Specialization::create([
                'strSpecDesc' => 'Scaffolder',
                'todelete' => 1,
                'status' => 1,
            ]);
    }
}
