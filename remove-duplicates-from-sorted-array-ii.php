<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $numsCount = count($nums);
        $count = 1;
        $before = $nums[0];
        for ($i = 1; $i < $numsCount; $i++) {
            if ($nums[$i] === $before) {
               $count++;
               if ($count > 2) {
                    unset($nums[$i]);
               }
            } else {
                $count = 1;
                $before = $nums[$i];
            }
        }
    }
}

$nums = [1,1,1,2,2,3];
$nums = [1,1,1,1];
(new Solution())->removeDuplicates($nums);
echo implode(',', $nums);
