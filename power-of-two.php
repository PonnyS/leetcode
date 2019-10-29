<?php

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfTwo($n)
    {
        if ($n === 0) {
            return false;
        } elseif ($n === 1) {
            return true;
        }

        while ($n != 2) {
            if ($n % 2 != 0) {
                return false;
            }
            $n = $n / 2;
        }

        return true;
    }
}

$ret = (new Solution())->isPowerOfTwo(1);
var_dump($ret);
