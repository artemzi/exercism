<?php

class Bob
{
    public function respondTo($m)
    {
        $m = trim($m);
        if ($m === '') return 'Fine. Be that way!';

        $l = substr($m, -1);

        if ($this->isShouting($m) && !$this->isNubmers($m)) {
            if ($l == "?") {
                if (!$this->isLetter($m)) {
                    return 'Sure.';
                }
                return 'Calm down, I know what I\'m doing!';
            }

                return "Whoa, chill out!";
        }

        if ($l == "?") {
            return 'Sure.';
        }

        return 'Whatever.';
    }

    public function isShouting($m) {
        for ($i=0; $i < strlen($m); $i++) {
            if ($this->isLegal($m[$i]) && ctype_lower($m[$i])) {
                return FALSE;
            }
        }

        return TRUE;
    }

    public function isNubmers($m) {
        for ($i=0; $i < strlen($m); $i++) {
            if ($this->isLegal($m[$i]) && !is_numeric($m[$i])) {
                return FALSE;
            }
        }

        return TRUE;
    }

    public function isLetter($m) {
        for ($i=0; $i < strlen($m); $i++) {
            if ($this->isLegal($m[$i]) && !ctype_alpha($m[$i])) {
                return FALSE;
            }
        }

        return TRUE;
    }

    private function isLegal(string $m): bool
    {
        if (in_array($m, [',', ' ', '?', '!', '\t'])) {
            return false;
        }

        return true;
    }
}
