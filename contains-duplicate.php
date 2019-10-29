<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        return count(array_unique($nums)) !== count($nums);
    }
}

$nums = [1,1,1,3,3,4,3,2,4,2];
$ret = (new Solution())->containsDuplicate($nums);
var_dump($ret);
