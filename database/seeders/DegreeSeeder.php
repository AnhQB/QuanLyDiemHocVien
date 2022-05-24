<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'name'=>'Khóa 1',
            'start_year'=> '2018',
            'end_year'=>'2022'
        ];
        Degree::create($data);
        $data=[
            'name'=>'Khóa 2',
            'start_year'=> '2019',
            'end_year'=>'2023'
        ];
        Degree::create($data);
        $data=[
            'name'=>'Khóa 3',
            'start_year'=> '2020',
            'end_year'=>'2024'
        ];
        Degree::create($data);
    }
}
