<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Group;
use App\Models\MajorSubject;
use App\Models\Manager;
use App\Models\Student;
use App\Models\Subject;
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
//
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
        $this ->call([
            MajorSubjectSeeder::class
        ]);
        Student::factory(4000)->create();
        Group::factory(120)->create();
    }
}
