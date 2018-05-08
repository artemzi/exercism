<?php

// not interested in problem research
// problem description is too long, I don't want to spend time on understanding.
// found this solution as interesting
class Game
{
    private $frames = [];
    private $rolls = [];
    private $openFrame = [];

    public function roll($score){
        $count = count($this->rolls);
        $this->rolls[] = $score;
        $this->openFrame[] = $count;

        if($score < 0 || 10 < $score)
            throw new Exception('out of range');

        if(count($this->openFrame) == 2 && $score+$this->rolls[$count-1] > 10)
            throw new Exception('frame score can\'t be over ten');

        if($count > 19 && $this->sumFrame(end($this->frames))!=10 )
            throw new Exception('can\'t have bonus rolls without a frame 10 special');

        if(count($this->openFrame) == 2 || $score == 10){
            $this->frames[] = $this->openFrame;
            $this->openFrame = [];
        }
    }

    public function score(){
        if(count($this->frames) < 10) throw new Exception('can\'t score an  game');

        $score = 0;

        foreach($this->frames as $i=>$frame){
            if($i >= 10) continue;

            $frameSum = $this->sumFrame($frame);

            if($frameSum == 10 && count($frame)==1){    //case strike
                if(!isset($this->rolls[$frame[0]+2]))
                    throw new Exception('missing bonus rolls for strike');

                $score += $frameSum + $this->rolls[$frame[0]+1] + $this->rolls[$frame[0]+2];

            }elseif($frameSum == 10 && count($frame)==2){   //case spare
                if(!isset($this->rolls[$frame[1]+1]))
                    throw new Exception('missing bonus rolls for spare');

                $score += $frameSum + $this->rolls[$frame[1]+1];

            }else{  //non-special frame
                $score += $frameSum;
            }
        }

        return $score;
    }

    private function sumFrame($frame){
        $sum = 0;
        foreach($frame as $roll){
            $sum += $this->rolls[$roll];
        }
        return $sum;
    }
}

