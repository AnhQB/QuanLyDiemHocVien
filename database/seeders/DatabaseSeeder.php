<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Manager;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Admin::factory(10)->create();
        Manager::factory(10)->create();
        $this->call([
            DegreeSeeder::class
        ]);
        $this->call([
            MajorSeeder::class
        ]);
        $this->call([
            SubjectSeeder::class
        ]);
        $this->call([
            DegreeMajorSeeder::class
        ]);
    }
}
