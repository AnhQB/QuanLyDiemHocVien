<?php

namespace App\Imports;

use App\Models\Group;
use App\Models\StudentGroup;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentGroupImport implements ToArray, WithHeadingRow
{
    private string $filename;
    private array $data;

    public function array(array $array): void
    {

        $arr = explode('_', $this->filename);
        if(Group::query()
            ->where([
                ['degree_id', $arr[0]],
                ['major_id', $arr[1]],
                ['id', $arr[2]],
                ['subject_id', $arr[3]],
            ])
            ->doesntExist()
        ){
            throw new \RuntimeException("Lớp không tồn tại với tên file");
        }
        foreach ($array as $each){
            $group_id = $arr[2];
            $subject_id = $arr[3];
            $student_id = $each['id'];
            StudentGroup::query()
                ->updateOrCreate([
                    'group_id' => $group_id,
                    'subject_id' => $subject_id,
                    'student_id' => $student_id,
                ]);
        }
        $this->data = $array;
    }

    public function fromFileName (string $filename): StudentGroupImport
    {
        $this->filename = $filename;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
