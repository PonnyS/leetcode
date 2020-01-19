<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $left = 0;
        $right = count($nums) - 1;

        $min = PHP_INT_MAX;
        while ($left <= $right) {
            $mid = (int)floor(($left+$right)/2);
            if ($nums[$mid] === $nums[$left] && $nums[$mid] === $nums[$right]) {
                $min = min($min, $nums[$mid]);
                $left = $left + 1;
                $right = $right - 1;
                continue;
            }

            if ($nums[$mid] >= $nums[$left]) {
                // 左边有序, 右边可能旋转
                $min = min($min, $nums[$left]);
                $left = $mid + 1;
            } else {
                // 右边有序，最小值可能在左边
                $min = min($min, $nums[$mid]);
                $right = $mid - 1;
            }
        }

        return $min;
    }
}

//$nums = [9];
$nums = [10,1,10,10];
//$nums = [2,2,2,0,1];
echo (new Solution())->findMin($nums);
