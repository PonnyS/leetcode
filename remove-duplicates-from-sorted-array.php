<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {

        $length = count($nums);
        $start = 0;
        $count = 0;
        for ($i = 0; $i < $length; $i++) {
            $count++;
            if ($nums[$i] === $nums[$i + 1]) {
                continue;
            }

            for ($j = 0; $j < $count - 1; $j++) {
                unset($nums[$start + $j]);
            }
            $start += $count;
            $count = 0;
        }
    }
}

$nums = [1,1,2,2,2];
(new Solution())->removeDuplicates($nums);
var_dump(implode(',', $nums));
