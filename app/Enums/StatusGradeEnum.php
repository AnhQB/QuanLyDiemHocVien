<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class StatusGradeEnum extends Enum
{
    public const NOTPASSED =   0;
    public const PASSED =   1;

    public static function getArrayStatus(): array
    {
        return [
            'Đạt' => self::PASSED,
            'Không Đạt' => self::NOTPASSED,
        ];
    }

}
