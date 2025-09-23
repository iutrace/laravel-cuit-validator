<?php

namespace Iutrace\Validation\Rules;

class Cuil extends Cuit
{
    public const TYPES = [
        20,
        23,
        24,
        25,
        26,
        27,
    ];

    public static function replacerMessage(string $attribute): string
    {
        return __('iutrace::validation.cuil', [
            'attribute' => $attribute,
        ]);
    }
}
