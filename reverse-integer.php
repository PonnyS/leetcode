<?php

class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $ret = 0;
        while ($x != 0) {
            $ret = $ret * 10 + $x % 10;
            $x = (int)($x / 10);
        }

        if ($ret < 0 && abs($ret) > pow(2, 31)) {
            return 0;
        } elseif ($ret > 0 && $ret > (pow(2, 31) - 1)) {
            return 0;
        }

        return $ret;
    }
}

$x = -123;
//$x = 2147483647;
echo (new Solution())->reverse($x);
