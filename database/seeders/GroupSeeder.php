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

        //subject major soft degree
        $subject_soft = MajorSubject::where('major_id','=',1)
                        ->orderby('semester_major')
                        ->pluck('semester_major','subject_id')

                        ->toArray();

        //subject major design
        $subject_design = MajorSubject::where('major_id','=',2)
                        ->orderby('semester_major')
                        ->pluck('semester_major','subject_id')
                        ->toArray();

//        foreach($subject_design_3 as $k=>$v){
//            echo ($k .'semester: ' . $v . '|');
//        }
//        echo("===================" . PHP_EOL);
        $count=1;
        foreach($degrees as $degree){
            $group=array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0);
            $group2=array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0);

            if($degree === 1) {
                $index=0;
                $semster_current=0;
                $semester_old=7;
                foreach ($subject_soft as $key => $val) {
//                    echo($key);
                    $semester_current=$val;
                    if ($val >= 7 && $val <= 9) {
                        if($semester_current !== $semester_old){ //xét xem đã đổi kỳ ch để add vào lớp khác
                                                                // (mỗi kỳ 2 lớp, mỗi lớp học 2 môn)
                            $index+=2;
                            $semester_old=$semester_current;
                        }
//                        echo(1);
                        //khóa 1 từ kỳ 7 đến kỳ 9
                        for ($i = $index; $i < ($index+2); $i++) {
                            if($group[$i] === 2){
                                break;
                            }else{
                                $group[$i]++;
                            }
                            $data = [
                                'id' => 'SE'.$count.($i + 1000),
                                'subject_id' => $key,
                                'degree_id' => '1',
                                'major_id' => '1',
                                'semester_year' => 'Spring2022',
                            ];
                            Group::create($data);
                        }
                    }
                }
                $index=0;
                $semster_current=0;
                $semester_old=7;
                foreach ($subject_design as $key => $val) {
                    $semester_current=$val;
                    if ($val >= 7 && $val <= 9) {
                        if($semester_current !== $semester_old){
                            $index+=2;
                            $semester_old=$semester_current;
                        }
                        //khóa 1 từ kỳ 1 đến kỳ 3
                        for ($i = $index; $i < ($index+2); $i++) {
                            if($group2[$i] === 2){
                                break;
                            }else{
                                $group2[$i]++;
                            }
                            $data = [
                                'id' => 'GD'.$count.($i + 1000),
                                'subject_id' => $key,
                                'degree_id' => '1',
                                'major_id' => '2',
                                'semester_year' => 'Spring2022',

                            ];
                            Group::create($data);
                        }
                    }
                }
            }
            else if($degree === 2) {
                $index=0;
                $semster_current=0;
                $semester_old=4;
                foreach ($subject_soft as $key => $val) {
                    $semester_current=$val;
                    if ($val >= 4 && $val <= 6) {
                        if($semester_current !== $semester_old){
                            $index+=2;
                            $semester_old=$semester_current;
                        }
                        //khóa 2 từ kỳ 4 đến kỳ 6
                        for ($i = $index; $i < ($index+2); $i++) {
                            if($group[$i] === 2){
                                break;
                            }else{
                                $group[$i]++;
                            }
                            $data = [
                                'id' => 'SE'.$count.($i + 1000),
                                'subject_id' => $key,
                                'degree_id' => '2',
                                'major_id' => '1',
                                'semester_year' => 'Spring2022',

                            ];
                            Group::create($data);
                        }
                    }
                }
                $index=0;
                $semster_current=0;
                $semester_old=4;
                foreach ($subject_design as $key => $val) {
                    $semester_current=$val;
                    if ($val >= 4 && $val <= 6) {
                        if($semester_current !== $semester_old){
                            $index+=2;
                            $semester_old=$semester_current;
                        }
                        for ($i = $index; $i < ($index+2); $i++) {
                            if($group2[$i] === 2){
                                break;
                            }else{
                                $group2[$i]++;
                            }
                            $data = [
                                'id' => 'GD'.$count.($i + 1000),
                                'subject_id' => $key,
                                'degree_id' => '2',
                                'major_id' => '2',
                                'semester_year' => 'Spring2022',

                            ];
                            Group::create($data);
                        }
                    }
                }
            }
            else {
                //khoa 3
                $index=0;
                $semster_current=0;
                $semester_old=1;
                foreach ($subject_soft as $key => $val) {
                    $semester_current=$val;
                    if ($val >= 1 && $val <= 3) {
                        if($semester_current !== $semester_old){
                            $index+=2;
                            $semester_old=$semester_current;
                        }
                        for ($i = $index; $i < ($index+2); $i++) {
                            if($group[$i] === 2){
                                break;
                            }else{
                                $group[$i]++;
                            }
                            $data = [
                                'id' => 'SE'.$count.($i + 1000),
                                'subject_id' => $key,
                                'degree_id' => '3',
                                'major_id' => '1',
                                'semester_year' => 'Spring2022',

                            ];
                            Group::create($data);
                        }
                    }
                }
                $index=0;
                $semster_current=0;
                $semester_old=1;
                foreach ($subject_design as $key => $val) {
                    $semester_current=$val;
                    if ($val >= 1 && $val <= 3  ) {
                        if($semester_current !== $semester_old){
                            $index+=2;
                            $semester_old=$semester_current;
                        }
                        for ($i = $index; $i < ($index+2); $i++) {
                            if($group2[$i] === 2){
                                break;
                            }else{
                                $group2[$i]++;
                            }
                            $data = [
                                'id' => 'GD'.$count.($i + 1000),
                                'subject_id' => $key,
                                'degree_id' => '3',
                                'major_id' => '2',
                                'semester_year' => 'Spring2022',

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

