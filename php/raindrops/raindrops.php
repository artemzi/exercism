<?php

// function raindrops($n)
// {
//     $res = '';
//     if ($n % 3 === 0) $res .= 'Pling';
//     if ($n % 5 === 0) $res .= 'Plang';
//     if ($n % 7 === 0) $res .= 'Plong';

//     return !$res ? (string) $n : $res;
// }

function raindrops(int $int): string
{
    $rain = [3 => 'Pling', 5 => 'Plang', 7 => 'Plong'];

    array_walk($rain, function (&$sound, $key) use ($int) {
        $sound = $int % $key === 0 ? $sound : null;
    });

    return implode($rain) ?: "$int";
};
