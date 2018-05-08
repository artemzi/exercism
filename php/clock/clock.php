<?php

class Clock
{
    /**
     * Time value in format of `H:i`
     */
    private $t;

    public function __construct(int $h, int $m = 0)
    {
        $time = $this->getTimeObject($h, $m);

        $this->t = $time->format('H:i');
    }

    public function __toString()
    {
        return $this->t;
    }

    public function add(int $m)
    {
        if (0 > $m) {
            $this->sub($m * -1); // handle add with negative value
        } else {
            $time = $this->getTimeObject();

            $time->add(new DateInterval('PT' . $m . 'M'));
            $this->t = $time->format('H:i');
        }

        return $this;
    }

    public function sub(int $m)
    {
        $time = $this->getTimeObject();

        $time->sub(new DateInterval('PT' . $m . 'M'));
        $this->t = $time->format('H:i');

        return $this;
    }

    /**
     * Create datetime object.
     */
    private function getTimeObject(int $h = 0, int $m = 0)
    {
        $time = new DateTime;
        // if function params is not passed `$this->t` already have value
        if (0 === $h && 0 === $m) {
            return $time->setTime($this->getHours(), $this->getMinutes());
        }

        // called from __constructor
        return $time->setTime($h, $m);
    }

    /**
     * Helper for getting hours from stored time value.
     */
    private function getHours()
    {
        return explode(':', $this->t)[0];
    }

    /**
     * Helper for getting minutes from stored time value.
     */
    private function getMinutes()
    {
        return explode(':', $this->t)[1];
    }
}
