<?php

const EXCLUDE = [' ', '-'];

// function isIsogram(string $w): bool
// {
//     $w = str_replace(EXCLUDE, "", str_replace(" ", "", mb_strtolower($w)));

//     for ($i = 0; $i < mb_strlen($w); $i++) {
//         $tmp = mb_substr($w, $i, 1);
//         // if ($tmp === ' ' || $tmp === '-') continue;
//         if (mb_substr_count($w, $tmp) > 1) {
//             return false;
//         }

//     }

//     return true;
// }

function isIsogram(string $word): bool
{
    $pure = str_replace(EXCLUDE, '', strtolower($word));
    $splited = preg_split('//u', $pure, -1, PREG_SPLIT_NO_EMPTY);

    return count($splited) === count(array_unique($splited));
}
