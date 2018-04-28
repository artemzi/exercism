<?php

function isLeap($y)
{
    return boolval(date("L", mktime(0, 0, 0, 7, 7, $y)));
    // return $y % 400 == 0 || ($y % 100 != 0 && ($y & 3) == 0);
}
