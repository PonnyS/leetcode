<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums)
    {
        $numsLength = count($nums);

        $res = [];
        $k = 1;
        for ($i = 0; $i < $numsLength; $i++) {
            $res[$i] = $k;
            $k *= $nums[$i];
        }

        $k = 1;
        for ($i = $numsLength - 1; $i >= 0; $i--) {
            $res[$i] *= $k;
            $k *= $nums[$i];
        }

        return $res;
    }
}

$nums = [1,2,3,4];
$ret = (new Solution())->productExceptSelf($nums);
var_dump($ret);
