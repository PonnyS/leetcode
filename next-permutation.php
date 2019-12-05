<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums)
    {
        $length = count($nums);
        if ($length <= 1) {
            return ;
        }

        // 第一个索引：nums[i] < nums[i+1]
        $firstIndex = -1;
        for ($i = $length - 2; $i >= 0; $i--) {
            if ($nums[$i] < $nums[$i+1]) {
                $firstIndex = $i;
                break;
            }
        }
        // 肯定是倒序的
        if ($firstIndex === -1) {
            $nums = array_reverse($nums);
            return ;
        }

        // 第二个索引：nums[i] > nums[firstIndex]
        $secondIndex = -1;
        for ($i = $length - 1; $i > $firstIndex; $i--) {
            if ($nums[$i] > $nums[$firstIndex]) {
                $secondIndex = $i;
                break;
            }
        }

        // 交换 firstIndex 和 secondIndex
        $tmp = $nums[$firstIndex];
        $nums[$firstIndex] = $nums[$secondIndex];
        $nums[$secondIndex] = $tmp;

        // 排序：
        // 从 0 到 firstIndex，是不用重排序的
        // 从 firstIndex+1 到 length-1，已经是倒序了，下一个排序那就需要翻转一下
        $left = array_slice($nums, 0, $firstIndex+1);
        $right = array_slice($nums, $firstIndex+1, $length-$firstIndex-1);
        $nums = array_merge($left, array_reverse($right));
    }
}

$nums = [4,5,3,2,1];
//$nums = [1,2,7,4,3,1];
(new Solution())->nextPermutation($nums);
echo implode(',', $nums);
