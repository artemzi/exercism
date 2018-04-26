<?php

function translate(string $line): string
{
    return implode(" ", array_map(function (string $w): string {
        foreach (["a", "e", "i", "o", "u", "yt", "xr"] as $vow) {
            if (substr($w, 0, strlen($vow)) === $vow) {
                return $w . "ay";
            }
        }
        foreach (["ch", "qu", "squ", "thr", "th", "sch"] as $con) {
            if (substr($w, 0, strlen($con)) === $con) {
                return substr($w, strlen($con)) . $con . "ay";
            }
        }
        return substr($w, 1) . substr($w, 0, 1) . "ay";
    }, explode(" ", $line)));
}
