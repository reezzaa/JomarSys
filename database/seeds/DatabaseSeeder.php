<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(ServicesOfferedSeeder::class);
        $this->call(ThisTableSeeder::class);

    }
}
