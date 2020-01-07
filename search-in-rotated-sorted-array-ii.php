<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Boolean
     */
    function search($nums, $target) {
        $i = 0;
        $j = count($nums) - 1;

        while ($i <= $j) {
            $middle = (int)(($i+$j)/2);
            if ($nums[$middle] === $target) {
                return true;
            }

            // 前部分有序
            if ($nums[$i] < $nums[$middle]) {
                if ($nums[$i] === $target) {
                    return true;
                }
                // 有序部分可以比较
                if ($nums[$middle] > $target && $nums[$i] < $target) {
                    $j = $middle-1;
                } else {
                    $i++;
                }
            } elseif ($nums[$i] === $nums[$middle]) {
                $i++;
                continue;
            } else {
                // 后部分有序
                if ($nums[$j] === $target) {
                    return true;
                }
                if ($nums[$middle] < $target && $nums[$j] > $target) {
                    $i = $middle+1;
                } else {
                    $j--;
                }
            }
        }
        return false;
    }
}

$nums = [2,5,6,0,0,1,2];
$target = 3;
$ret = (new Solution())->search($nums, $target);
var_dump($ret);
