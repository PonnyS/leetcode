<?php

class Solution {

    /**
     * @param Integer $s
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($s, $nums) {
        $left = 0;
        $ans = PHP_INT_MAX;
        $sum = 0;
        for ($i = 0; $i < count($nums); $i++) {
            $sum += $nums[$i];
            while ($sum >= $s) {
                $ans = min($ans, $i+1-$left);
                $sum -= $nums[$left++];
            }
        }
        return $ans === PHP_INT_MAX ? 0 : $ans;
    }
}

$s = 11;
$nums = [2,3,1,2,4,3];
//$nums = [1,2,3,4,5];

echo (new Solution())->minSubArrayLen($s, $nums);
