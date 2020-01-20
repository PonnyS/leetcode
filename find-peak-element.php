<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums) {
        $left = 0;
        $right = count($nums) - 1;
        while ($left < $right) {
            $mid = (int)floor(($left+$right)/2);
            if ($nums[$mid] > $nums[$mid+1]) {
                $right = $mid;
            } else {
                $left = $mid+1;
            }
        }
        return $left;
    }
}

// pmt002_01
$nums = [1,2,3,1];
echo (new Solution())->findPeakElement($nums);
