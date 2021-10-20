<?php

namespace Iutrace\Validation\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Cuit implements Rule
{
    const TYPES = [
        20,
        23,
        24,
        25,
        26,
        27,
        30,
        33,
        34,
    ];

    /* @var $attribute String */
    protected $attribute;

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;

        if (strlen($value) != 11) {
            return false;
        }

        if (! Str::startsWith($value, self::TYPES)) {
            return false;
        }

        $type = substr($value, 0, 2);
        $identification = substr($value, 2, 8);
        $verifier = substr($value, 10, 1);

        $digits = array_reverse(str_split($type . $identification));

        $multiplier = 2;
        $accumulator = 0;
        foreach ($digits as $digit) {
            $accumulator += $digit * $multiplier;

            $multiplier = ($multiplier + 1) % 8;
            $multiplier = $multiplier === 0 ? 2 : $multiplier;
        }

        $calculatedVerifier = 11 - ($accumulator % 11);

        if ($calculatedVerifier == 11) {
            $calculatedVerifier = 0;
        } elseif ($calculatedVerifier == 10) {
            $calculatedVerifier = 1;
        }

        return $verifier == $calculatedVerifier;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return __('iutrace::validation.cuit', [
            'attribute' => $this->attribute,
        ]);
    }
}
