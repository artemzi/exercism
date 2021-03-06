<?php

/**
 * Popular problem, it's simple.
 */
function toRoman(int $d): string
{
    $m = [
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1,
    ];

    $r = '';
    foreach ($m as $letter => $digit) {
        $r .= str_repeat($letter, $d / $digit);
        $d %= $digit;
    }

    return $r;
}