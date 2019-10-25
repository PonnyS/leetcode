<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target)
    {
        $i = 0;
        $j = count($nums) - 1;

        while ($i <= $j) {
            $middle = (int)(($i + $j) / 2);
            if ($nums[$middle] === $target) {
                return $middle;
            }

            if ($nums[$i] < $nums[$middle]) {
                if ($nums[$i] === $target) {
                    return $i;
                }
                if ($target > $nums[$i] && $target < $nums[$middle]) {
                    $j = $middle - 1;
                } else {
                    $i++;
                }
            } else {
                if ($nums[$j] === $target) {
                    return $j;
                }
                if ($target > $nums[$middle] && $target < $nums[$j]) {
                    $i = $middle + 1;
                } else {
                    $j--;
                }
            }
        }

        return -1;
    }
}

$nums = [4,5,6,7,0,1,2];
$nums = [1];

echo (new Solution())->search($nums, 1);