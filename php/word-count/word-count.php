<?php

function wordCount($line)
{
    $line = trim(preg_replace('/[^[:alnum:][:space:]]/u', '', $line)); // remove non alpha and trailing spaces
    $data = preg_split('/\s+/', $line); // split by whitespace
    $result = [];

    foreach ($data as $val) {
        $val = strtolower($val);
        if (!array_key_exists($val, $result)) $result[$val] = 0;
        $result[$val]+=1;
    }

    return $result;
}