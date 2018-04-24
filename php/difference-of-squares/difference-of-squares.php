<?php

function squareOfSums(int $d): int
{
    $sq = 0;

    foreach (range(0, $d) as $val) {
        $sq += $val;
    }

    return pow($sq, 2);
}

function sumOfSquares(int $d): int
{
    $sum = 0;

    foreach (range(0, $d) as $val) {
        $sum += pow($val, 2);
    }

    return $sum;
}

function difference(int $d): int
{
    return squareOfSums($d) - sumOfSquares($d);
}