<?php

class Series
{
    public $data;
    public $dataLength;

    public function __construct(string $sequence)
    {
        $this->data = $sequence;
        $this->dataLength = strlen($sequence);
    }

    /**
     * Calculate product of each substring by given length and find largest
     */
    public function largestProduct(int $l): int
    {
        if ($this->dataLength < $l || $l < 0) throw new InvalidArgumentException();
        if ($this->dataLength == 0 || $l == 0) return 1;

        $r = 1;
        for ($i = 0; $i < $this->dataLength; $i++) {
            $s = substr($this->data, $i, $l);
            if (strlen($s) == $l) {
                $step = 1;
                for ($j = 0; $j < $l; $j++) {
                    try {
                        $step *= $s[$j];
                    } catch(Exception $e) {
                        throw new InvalidArgumentException();
                    }
                }
                if ($step > $r) $r = $step;
            }
        }
        return $r === 1 ? 0 : $r ;
    }
}
