<?php

namespace Database\Seeders;

use App\Models\Degree;
use App\Models\DegreeMajor;
use App\Models\Major;
use Illuminate\Database\Seeder;

class DegreeMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $degrees= Degree::query()->pluck('id')->toarray();
        $majors= Major::query()->pluck('id')->toarray();
        $arr=[];
        foreach ($degrees as  $degree){
            foreach($majors as $major){
                $data=[
                    'degree_id'=>$degree,
                    'major_id'=>$major,
                ];
                DegreeMajor::insert($data);
            }
        }
//        DegreeMajor::insert($arr);
    }
}
