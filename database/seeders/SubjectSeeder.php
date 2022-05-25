<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr=[
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
        foreach ($arr as $key => $val){
            $data=[
                'name'=>$key,
                'exam_type'=>$val,
            ];
            Subject::create($data);
        }
    }
}
