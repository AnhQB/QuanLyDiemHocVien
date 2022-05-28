<?php

namespace Database\Seeders;

use App\Models\Degree;
use App\Models\Group;
use App\Models\MajorSubject;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $majors= Major::query()->pluck('id')->toarray();
        $degrees= Degree::query()->pluck('id')->toArray();
//        $subjects= Subject::query()->pluck('id')->toarray();
        $subject_soft = MajorSubject::where('major_id','=',1)
                        ->pluck('semester_major','subject_id')
                        ->toArray();

        $subject_design = MajorSubject::where('major_id','=',2)
                        ->pluck('semester_major','subject_id')
                        ->toArray();

        $count=1;
        foreach($degrees as $degree){
            $group=array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0);
            $group2=array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0);

            if($degree === 1) {
                foreach ($subject_soft as $key => $val) {
//                    echo($key);
                    if ($val >= 1 && $val <= 3) {
//                        echo(1);
                        //khóa 1 từ kỳ 1 đến kỳ 3
                        for ($i = 0; $i < 7; $i++) {
                            if($group[$i] === 2){
                                continue;
                            }else{
                                $group[$i]++;
                            }
                            $data = [
                                'name' => 'SE'.$count.($i + 1000),
                                'degree_id' => '1',
                                'major_id' => '1',
                                'subject_id' => $key,
                            ];
                            Group::create($data);
                        }
                    }
                }
                foreach ($subject_design as $key => $val) {
                    if ($val >= 1 && $val <= 3) {
                        //khóa 1 từ kỳ 1 đến kỳ 3
                        for ($i = 0; $i < 7; $i++) {
                            if($group2[$i] === 2){
                                continue;
                            }else{
                                $group2[$i]++;
                            }
                            $data = [
                                'name' => 'GD'.$count.($i + 1000),
                                'degree_id' => '1',
                                'major_id' => '2',
                                'subject_id' => $key,
                            ];
                            Group::create($data);
                        }
                    }
                }
            }
            else if($degree === 2) {
                foreach ($subject_soft as $key => $val) {
                    if ($val >= 4 && $val <= 6) {
                        //khóa 2 từ kỳ 4 đến kỳ 6
                        for ($i = 0; $i < 7; $i++) {
                            if($group[$i] === 2){
                                continue;
                            }else{
                                $group[$i]++;
                            }
                            $data = [
                                'name' => 'SE'.$count.($i + 1000),
                                'degree_id' => '2',
                                'major_id' => '1',
                                'subject_id' => $key,
                            ];
                            Group::create($data);
                        }
                    }
                }
                foreach ($subject_design as $key => $val) {
                    if ($val >= 4 && $val <= 6) {
                        for ($i = 0; $i < 7; $i++) {
                            if($group2[$i] === 2){
                                continue;
                            }else{
                                $group2[$i]++;
                            }
                            $data = [
                                'name' => 'GD'.$count.($i + 1000),
                                'degree_id' => '2',
                                'major_id' => '2',
                                'subject_id' => $key,
                            ];
                            Group::create($data);
                        }
                    }
                }
            }
            else {

                foreach ($subject_soft as $key => $val) {
                    if ($val >= 7 && $val <= 9) {
                        //khóa 3 từ kỳ 7 đến kỳ 9
                        for ($i = 0; $i < 7; $i++) {
                            $data = [
                                'name' => 'SE'.$count.($i + 1000),
                                'degree_id' => '3',
                                'major_id' => '1',
                                'subject_id' => $key,
                            ];
                            Group::create($data);
                        }
                    }
                }
                foreach ($subject_design as $key => $val) {
                    if ($val >= 7 && $val <= 9) {
                        for ($i = 0; $i < 7; $i++) {
                            $data = [
                                'name' => 'GD'.$count.($i + 1000),
                                'degree_id' => '3',
                                'major_id' => '2',
                                'subject_id' => $key,
                            ];
                            Group::create($data);
                        }
                    }
                }
            }
            $count++;
        }


    }
 }

