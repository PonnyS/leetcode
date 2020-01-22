<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k) {
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($map[$nums[$i]]) && ($i - $map[$nums[$i]] <= $k)) {
                return true;
            } else {
                $map[$nums[$i]] = $i;
            }
        }

        return false;
    }
}

$nums = [1,2,3,1,2,3];
$nums = [99,99];
$k = 2;
$ret = (new Solution())->containsNearbyDuplicate($nums, $k);
var_dump($ret);
