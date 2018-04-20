<?php

// alternative: str_replace
function toRna($line)
{
    $rel = [
        'G' => 'C',
        'C' => 'G',
        'T' => 'A',
        'A' => 'U',
    ];

    for ($i=0; $i < strlen($line); $i++) {
        if (array_key_exists($line[$i], $rel)) {
            $line[$i] = $rel[$line[$i]];
        }
    }

    return $line;
}