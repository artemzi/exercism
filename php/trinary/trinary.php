<?php

function toDecimal($num)
{
    $len = strlen($num);
    $result = 0;

    // if (!preg_match('/[^0-2]/', $num)) {
        for ($i = 0; $i < $len; $i++) {
            $d = intval($num[$i]);
            if ($d > 2) return 0;
            $result +=  $d * pow(3, $len - ($i + 1));
        }
    // }

    return $result;
}