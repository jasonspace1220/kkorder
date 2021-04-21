<?php

namespace lib\Qa;

use lib\Qa\QAInterface;

abstract class BaseQA implements QAInterface
{
    protected $valid;
    protected $question;

    public function qa($question):string
    {
        return readline($question);
    }

    public function startQa() : array
    {
        $inputs = [];
        $stop = false;

        while ($stop == false) {

            $in = $this->qa($this->question);

            if ($in == "") {
                break;
            }

            array_push($inputs, $in);
        }

        return $inputs;
    }
}
