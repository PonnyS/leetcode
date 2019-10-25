<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findLengthOfLCIS($nums)
    {
        $numLength = count($nums);
        if ($numLength <= 1) {
            return $numLength;
        }

        $max = 0;
        $tmp = 1;
        for ($i = 0; $i < count($nums) - 1; $i++) {
            if ($nums[$i] < $nums[$i+1]) {
                $tmp++;
            } else {
                $max = max($max, $tmp);
                $tmp = 1;
            }
        }
        $max = max($max, $tmp);

        return $max;
    }
}

$nums = [1,3,5,80,90,10,11,12,13,15];
$nums = [1];
echo (new Solution())->findLengthOfLCIS($nums);
