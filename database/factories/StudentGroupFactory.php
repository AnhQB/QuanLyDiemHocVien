<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $groups=Group::query()->pluck('id','subject_id')->toarray();
        $students=Student::query()->pluck('id')->toarray();
        return [

        ];
    }
}
