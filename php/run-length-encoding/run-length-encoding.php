<?php

/**
 * greedy approach. tests passed
 * TODO: simlify logic; it looks ugly
 */

function encode($input)
{
    if ($input == '') {
        return '';
    }

    $data = [];
    $lastInsertIndex = 0;
    $result = '';

    for ($i = 0; $i < strlen($input); $i++) {
        if ($i === 0) {
            $data[$i] = [$input[$i] => 1];
            continue;
        }

        if ($input[$i] === $input[$i-1]) {
            $data[$lastInsertIndex][$input[$lastInsertIndex]]++;
            continue;
        } else {
            $data[$i] = [$input[$i] => 1];
            $lastInsertIndex = $i;
            continue;
        }
    }

    foreach($data as $k=>$v) {
        foreach($v as $letter=>$count) {
            if ($count > 1) {
                $result .= $count . $letter;
            } else {
                $result .= $letter;
            }
        }
    }
    return $result;
}

function decode($input)
{
    $result = '';
    $mul = '';

    for ($i = 0; $i < strlen($input); $i++) {
        if (is_numeric($input[$i])) {
            $mul .= $input[$i];
            continue;
        }

        if (!is_numeric($mul)) {
            $result .= $input[$i];
        } else {
            $result .= str_repeat($input[$i], $mul);
            $mul = '';
        }
    }

    return $result;
}
