<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class GradeExamFormEnum extends Enum
{
    public const THEORY_EXAM =   0;
    public const PRACTICE_EXAM =   1;

}
