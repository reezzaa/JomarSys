<?php

use Illuminate\Database\Seeder;
use App\ServicesOffered;
class ServicesOfferedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServicesOffered::create([
                'strServiceOffName' => 'Installation and Fabrication of Venting',
                'todelete' => 1,
                'status' => 1,
            ]);
        ServicesOffered::create([
                'strServiceOffName' => 'Installation of Wield-Neck Flange',
                'todelete' => 1,
                'status' => 1,
            ]);
        ServicesOffered::create([
                'strServiceOffName' => 'Fabrication of Collapsible Ladder',
                'todelete' => 1,
                'status' => 1,
            ]);
        ServicesOffered::create([
                'strServiceOffName' => 'Scaffolding',
                'todelete' => 1,
                'status' => 1,
            ]);
    }
}
