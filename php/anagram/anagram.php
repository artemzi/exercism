<?php

function detectAnagrams(string $word, Array $list): Array
{
    $word = mb_strtolower($word);
    $result = [];

    foreach ($list as $w) {
        if (mb_count_chars(mb_strtolower($w)) == mb_count_chars($word) && mb_strtolower($w) !== $word) {
            if (!in_array($w, $result)) array_push($result, $w);
        }
    }

    return $result;
}

function mb_count_chars($input)
{
    $l = mb_strlen($input, 'UTF-8');
    $unique = array();
    for ($i = 0; $i < $l; $i++) {
        $char = mb_substr($input, $i, 1, 'UTF-8');
        if (!array_key_exists($char, $unique)) {
            $unique[$char] = 0;
        }
        $unique[$char]++;
    }
    return $unique;
}
