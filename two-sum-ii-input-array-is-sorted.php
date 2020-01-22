<?php

class Solution {

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        $low = 0;
        $high = count($numbers) - 1;

        while ($low < $high) {
            $sum = $numbers[$low] + $numbers[$high];
            if ($sum === $target) {
                return [$low+1, $high+1];
            } elseif ($sum < $target) {
                $low++;
            } else {
                $high--;
            }
        }
        return [-1,-1];
    }
}

$numbers = [2, 7, 11, 15];
$target = 9;

$ret = (new Solution())->twoSum($numbers, $target);
echo implode(',', $ret);
