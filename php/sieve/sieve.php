<?php

function sieve(int $d): Array
{
    if ($d < 2) return [];

    $sieve = [];
    $data = range(2, $d);

    // initialize sieve
    foreach ($data as $k) {
        $sieve[$k] = 1;
    }

    // mark digits
    foreach ($sieve as $n => $v) {
        if ($v) {
            for ($i = pow($n, 2); $i <= count($data)+1; $i += $n) {
                $sieve[$i] = 0;
            }
        }
    }

    // filter unmarked values
    $result = array_filter($sieve, function ($val, $key) {
        if ($val) return $key;
    }, ARRAY_FILTER_USE_BOTH);

    return array_keys($result);
}