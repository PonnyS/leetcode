<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $ans = $nums[0];
        $sum = 0;
        foreach ($nums as $num) {
            if ($sum > 0) {
                $sum += $num;
            } else {
                $sum = $num;
            }
            $ans = max($ans, $sum);
        }

        return $ans;
    }
}

$nums = [-2,1,-3,4,-1,2,1,-5,4];
echo (new Solution())->maxSubArray($nums);
