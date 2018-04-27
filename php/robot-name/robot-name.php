<?php

class Robot
{
    private $_name;

    public function __construct()
    {
        $this->reset();
    }

    public function getName()
    {
        return $this->_name;
    }

    public function reset()
    {
        $this->_name = Registry::magic();
    }
}

class Registry
{
    private static $_registry = [];

    public static function magic()
    {
        do {
            $l = range('A', 'Z');
            shuffle($l);

            $name = $l[rand(0, 25)] . $l[rand(0, 25)] . sprintf('%03d', mt_rand(0, 999));
        } while (in_array($name, self::$_registry));

        self::$_registry[] = $name;
        return $name;
    }
}
