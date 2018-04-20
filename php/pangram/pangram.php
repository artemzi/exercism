<?php

function isPangram($line)
{
// return count(array_unique(str_split(preg_replace('/[^a-z]/', '', strtolower($line))))) == 26;

    if (empty($line)) return false;

    foreach (range('a', 'z') as $char) {
        if (strpos(strtolower($line), $char) === false) {
            return false;
        }
    }

    return true;
}