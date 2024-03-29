<?php

namespace App\Imports;

use App\Models\Major;
use App\Models\MajorSubject;
use Exception;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CurriculumImport implements ToArray, WithHeadingRow
{
    protected array $data;
    protected string $fileName;

    public function array(array $array): void
    {
        $originFileName = basename($this->fileName, ".csv");
        $arr = explode('_', $originFileName);
        if (Major::query()
            ->where('name', $arr[0])
            ->where('id', $arr[1])
            ->doesntExist()) {
            throw new \RuntimeException('Chuyên ngành không tìm thấy');
        }
        foreach ($array as $each) {
            try {
                $major_id = $arr[1];
                $subject_id = $each['subject_id'];
                $semester_major = $each['semester_major'];

                MajorSubject::query()->updateOrCreate([
                    'major_id' => $major_id,
                    'subject_id' => $subject_id,
                    'semester_major' => $semester_major,
                ]);
            }catch (\Exception $e){
                $start_index = strpos($e->getMessage(), ":", strpos($e->getMessage(), ":", ) +1 )+1;
                $variable = substr($e->getMessage(),
                    $start_index,
                    strpos($e->getMessage(), "(") - $start_index
                );
                throw new \RuntimeException($variable);
            }
        }


        $this->data = $array;
    }

    public function getData(): CurriculumImport
    {
        return $this;
    }

    public function fromFileName(string $fileName): CurriculumImport
    {
        $this->fileName = $fileName;
        return $this;
    }
}
