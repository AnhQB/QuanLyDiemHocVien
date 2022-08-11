<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class GenderEnum extends Enum
{
    public const Male =   0;
    public const Female  =   1;

    public static function getArrayGender(): array
    {
        return [
            'Nam' => self::Male,
            'Nữ' => self::Female,
        ];
    }
}
