<?php

function from($date)
{
    // $d = new DateTime($date->format("Y-m-d H:i:s"), new DateTimeZone("UTC"));
    $d = clone $date;

    return $d->add(new DateInterval('PT1000000000S'));
}
