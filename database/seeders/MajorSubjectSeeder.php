<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\MajorSubject;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class MajorSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors= Major::query()->pluck('id')->toarray();
        $subjects= Subject::query()->pluck('id','name')->toarray();
        $software=[
            'Giải tích 1'=>'1',
            'Giải tích 2'=>'1',
            'Xác suất thống kê' => '1',
            'Cấu trúc dữ liệu'=>'2',
            'Lập trình cơ bản'=>'2',
            'Mạng máy tính'=>'2',
            'Lập trình hướng đối tượng'=>'2',
            'Phân tích và thiết kể thuật toán'=>'2',
            'Cơ sở dữ liệu'=>'2',
            'Phân tích yêu cầu phần mêm'=>'1',
            'Kiểm thử phần mềm'=>'1',
            'Bảo trì phần mêm'=>'1',
            'Lập trình Web'=>'2',
            'Những nguyên lý cơ bản của CN Mác-Lênin'=>'1',
            'Tư tưởng Hồ Chí Minh'=>'1',
            'Đường lối cách mạng của Đảng Cộng sản Việt Nam'=>'1',
            'Pháp luật đại cương'=>'1',
            'Logic học đại cương'=>'1',
        ];

        $design=[
            'Phương pháp thiết kế'=>'1',
            'Giải phẫu tạo hình'=>'1',
            'Định luật xa gần'=>'1',
            'Hình họa 1'=>'2',
            'Hình họa 2'=>'2',
            'Hình họa 3'=>'2',
            'Hình họa 4'=>'2',
            'Nghệ thuật chữ'=>'1',
            'Đồ họa vi tính 1'=>'2',
            'Đồ họa vi tính 2'=>'2',
            'Đồ họa vi tính 3'=>'2',
            'Sáng tác thiết kể 1'=>'2',
            'Sáng tác thiết kể 2'=>'2',
            'Những nguyên lý cơ bản của CN Mác-Lênin'=>'1',
            'Tư tưởng Hồ Chí Minh'=>'1',
            'Đường lối cách mạng của Đảng Cộng sản Việt Nam'=>'1',
            'Pháp luật đại cương'=>'1',
            'Logic học đại cương'=>'1',
        ];

        $index=0;
        $semester=1;
        foreach($subjects as $key => $val){
            if($index % 2 === 0 && $index !== 0){
                $semester++;
            }
            foreach($software as $k => $v){
                if($k === $key){
                    $data=[
                        'major_id'=>'1',
                        'subject_id'=>$val,
                        'semester_major'=>$semester,
                    ];
                    MajorSubject::create($data);
                    $index++;
                }
            }

        }

        $index=0;
        $semester=1;
        foreach($subjects as $key => $val){
            if($index % 2 === 0 && $index !==0){
                $semester++;
            }
            foreach($design as $k => $v){
                if($k === $key){
                    $data=[
                        'major_id'=>'2',
                        'subject_id'=>$val,
                        'semester_major'=>$semester,
                    ];
                    MajorSubject::create($data);
                    $index++;
                }
            }
        }

    }
}
