<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstName . ' ' . $this->faker->lastName;
        $nameEngTrim = trim($this->stripAccents($name), ' ') ;
        $password = "admin";
        return [
            'name'=> $name,
            'gender'=>$this->faker->boolean,
            'phone'=>$this->faker->phoneNumber,
            'email'=> $nameEngTrim . "_admin@gmail.com",
            'password'=> Hash::make($password),
        ];
    }

    public function stripAccents($str) {
        return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }
}
