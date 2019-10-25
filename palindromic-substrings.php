<?php

class Solution {

    protected $sLength = 0;

    /**
     * @param String $s
     * @return Integer
     */
    function countSubstrings($s)
    {
        $this->sLength = strlen($s);

        $count = 0;
        for ($i = 0; $i < $this->sLength; $i++) {
            $count += $this->countSegment($s, $i, $i);
            $count += $this->countSegment($s, $i, $i + 1);
        }

        return $count;
    }

    public function countSegment($s, $left, $right)
    {
        $count = 0;

        while ($left >=0 && $right < $this->sLength && $s[$left--] === $s[$right++]) {
            $count++;
        }

        return $count;
    }
}
