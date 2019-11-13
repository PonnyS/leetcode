<?php

class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
        $result = (int)preg_replace("/(e(.)*)/", "", trim($str, " "));

        $max = (1 << 31) - 1;
        $min = -(1 << 31);
        return $result > $max ? $max : ($result < $min ? $min : $result);
    }
}

$str = "4193 with words";
echo (new Solution())->myAtoi($str);
