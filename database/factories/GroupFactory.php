<?php

namespace Database\Factories;

use App\Models\Degree;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $majors= Major::query()->pluck('id')->toarray();
        $degrees= Degree::query()->pluck('id')->toarray();
        $subjects= Subject::query()->pluck('id')->toarray();
        return [
            'name'=>$this->faker->randomElement(['SE','GD']). $this->faker->randomElement($degrees) . $this->faker->numberBetween($min = 100, $max = 999),
            'degree_id'=>$this->faker->randomElement($degrees),
            'major_id'=>$this->faker->randomElement($majors),
            'subject_id'=>$this->faker->randomElement($subjects),

        ];
    }
}
