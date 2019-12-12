<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums)
    {
        $p0 = 0;
        $current = 0;
        $p2 = count($nums) - 1;

        while ($current <= $p2) {
            if ($nums[$current] === 0) {
                $tmp = $nums[$current];
                $nums[$current] = $nums[$p0];
                $nums[$p0] = $tmp;
                $p0++;
                $current++;
            } elseif ($nums[$current] === 2) {
                $tmp = $nums[$current];
                $nums[$current] = $nums[$p2];
                $nums[$p2] = $tmp;
                $p2--;
            } else {
                $current++;
            }
        }
    }
}

$nums = [2,0,2,1,1,0];
//$nums = [1,2,0];
(new Solution())->sortColors($nums);
echo implode(',', $nums);
