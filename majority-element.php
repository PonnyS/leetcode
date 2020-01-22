<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        sort($nums);
        $mid = (int)floor((count($nums)-1)/2);
        return $nums[$mid];
    }
}

$nums = [1,1,1,2,2,2,2];
echo (new Solution())->majorityElement($nums);
