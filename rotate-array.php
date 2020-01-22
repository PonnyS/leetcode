<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        $k = $k % count($nums);
        $this->helper($nums, 0, count($nums)-1);
        $this->helper($nums, 0, $k-1);
        $this->helper($nums, $k, count($nums)-1);
    }

    protected function helper(&$nums, $start, $end) {
        while ($start < $end) {
            $tmp = $nums[$start];
            $nums[$start] = $nums[$end];
            $nums[$end] = $tmp;
            $start++;
            $end--;
        }
    }
}

$nums = [1,2,3,4,5,6,7];
$k = 3;
(new Solution())->rotate($nums, $k);
echo implode(',', $nums);
