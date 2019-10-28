<?php

class Solution {

    protected $sLength = 0;
    protected $s;
    protected $max = 0;
    protected $maxS = '';

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $this->s = $s;
        $this->sLength = strlen($s);
        if ($this->sLength <= 1) {
            return $this->s;
        }

        for ($i = 0; $i < $this->sLength - 1; $i++) {
            $this->helper($i, $i);
            $this->helper($i, $i+1);
        }

        return $this->maxS;
    }

    protected function helper($left, $right)
    {
        $count = 0;

        $substring = '';
        if ($left == $right) {
            $substring = $this->s[$left];
            $count++;
            $left--;
            $right++;
        }

        while ($left >= 0 && $right < $this->sLength && $this->s[$left] == $this->s[$right]) {
            $substring = $this->s[$left] . $substring . $this->s[$right];
            $count += 2;
            $left--;
            $right++;
        }

        if ($count >= $this->max) {
            $this->max = $count;
            $this->maxS = $substring;
        }
    }
}

$s = 'babaaaaad';
$s = 'ccc';

echo (new Solution())->longestPalindrome($s);
