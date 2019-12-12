<?php

class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        $left = 1;

        for ($i = count($digits) - 1; $i >= 0; $i--) {
            $tmp = $digits[$i] + $left;
            if ($tmp >= 10) {
                $digits[$i] = $tmp - 10;
                $left = 1;
            } else {
                $digits[$i] = $tmp;
                $left = 0;
            }
        }
        if ($left) {
            array_unshift($digits, 1);
        }

        return $digits;
    }
}

$digits = [9];
$ret = (new Solution())->plusOne($digits);
echo implode(',', $ret);
