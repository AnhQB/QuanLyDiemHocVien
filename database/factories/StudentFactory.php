<?php

namespace Database\Factories;

use App\Models\Degree;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
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
        $degree = $this -> faker -> randomElement($degrees);
        $semester =1;
        switch ($degree) {
            case 1:
                $semester = random_int(7,9);
                break;
            case 2:
                $semester = random_int(4,6);
                break;
            case 3:
                $semester = random_int(1,3);
                break;
        }
        return [
            'name'=>$this->faker->firstName . ' ' . $this->faker->lastName,
            'avatar' => $this -> faker -> imageUrl(),
            'gender' => $this -> faker -> boolean,
            'phone' => $this -> faker -> phoneNumber,
            'address' => $this -> faker -> address,
            'email' => $this -> faker -> email,
            'password' => $this -> faker -> password,
            'semester_major' => $semester,
            'major_id' => $this -> faker -> randomElement($majors)  ,
            'degree_id' => $degree,
        ];
    }
}
