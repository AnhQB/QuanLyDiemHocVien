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

        return [
            'name'=>$this->faker->firstName . ' ' . $this->faker->lastName,
            'avatar' => $this -> faker -> imageUrl(),
            'gender' => $this -> faker -> boolean,
            'phone' => $this -> faker -> phoneNumber,
            'address' => $this -> faker -> address,
            'email' => $this -> faker -> email,
            'password' => $this -> faker -> password,
            'semester_major' => $this -> faker -> randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9]),
            'major_id' => $this -> faker -> randomElement($majors)  ,
            'degree_id' => $this -> faker -> randomElement($degrees),


        ];
    }
}
