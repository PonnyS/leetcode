<?php

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        $x = (string)$x;
        $len = strlen($x);

        $halfLength = (int)floor($len / 2);
        for ($i = 0; $i < $halfLength; $i++) {
            if ($x[$i] !== $x[$len - $i - 1]) {
                return false;
            }
        }

        return true;
    }
}

$x = 1;
$ret = (new Solution())->isPalindrome($x);
var_dump($ret);
