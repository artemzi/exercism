<?php

function distance($a, $b)
{
    if (strlen($a) !== strlen($b)) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    }
    // ===
    // $result = 0;
    // for ($i=0; $i < strlen($a); $i++) { 
    //     if ($a[$i] !== $b[$i]) $result++;
    // }
    // return $result;
    // ===
    return count(array_diff_assoc(str_split($a), str_split($b)));

}