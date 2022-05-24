<?php

namespace Database\Seeders;

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
        $software=[
            'Giải tích 1',
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
            'Đồ họa vi tính 2'=>'2',
            'Sáng tác thiết kể 1'=>'2',
            'Sáng tác thiết kể 2'=>'2',
        ];
    }
}
