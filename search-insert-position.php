<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {

        $min = null;
        $index = 0;

        $start = 0;
        $end = count($nums) - 1;
        while ($start <= $end) {
            $mid = (int)floor(($start + $end) / 2);
            if ($nums[$mid] === $target) {
                return $mid;
            } elseif ($nums[$mid] < $target) {
                if (is_null($min) || $nums[$mid] > $min) {
                    $min = $nums[$mid];
                    $index = $mid;
                }
                $start = $mid + 1;
            } else {
                $end = $mid - 1;
            }
        }

        return is_null($min) ? 0 : $index + 1;
    }
}

$nums = [7];
$target = 7;
echo (new Solution())->searchInsert($nums, $target);
