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

$nums = [3,4,5,1,2];
$nums = [5,6,7,0,1,2,4];
echo (new Solution())->findMin($nums);
