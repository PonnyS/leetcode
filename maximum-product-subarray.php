<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        $max = PHP_INT_MIN;
        $imax = $imin = 1;
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] < 0) {
                $tmp = $imax;
                $imax = $imin;
                $imin = $tmp;
            }
            $imax = max($imax * $nums[$i], $nums[$i]);
            $imin = min($imin * $nums[$i], $nums[$i]);
            $max = max($max, $imax);
        }

        return $max;
    }
}

$nums = [2,3,-2,4];
$nums = [-4,-3, 13];
//$nums = [0, 2];

echo (new Solution())->maxProduct($nums);
