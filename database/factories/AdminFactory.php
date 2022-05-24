<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->firstName . ' ' . $this->faker->lastName,
            'gender'=>$this->faker->boolean,
            'phone'=>$this->faker->phoneNumber,
            'email'=>$this->faker->email,
            'password'=>$this->faker->password,
        ];
    }
}
