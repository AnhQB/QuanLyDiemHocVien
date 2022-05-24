<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'name'=>'Kỹ Thuật Phần Mềm'
        ];
        Major::create($data);
//        $data=[
//            'name'=>'Trí Tuệ Nhân Tạo'
//        ];
//        Major::create($data);
        $data=[
            'name'=>'Thiết Kế Đồ Họa'
        ];
        Major::create($data);
    }
}
