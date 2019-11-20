<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums)
    {
        $k = 0;
        for ($i = 0; $i < count($nums); $i++)
        {
            if ($i > $k) {
                return false;
            }
            $k = max($k, $i + $nums[$i]);
        }
        return true;
    }
}

$nums = [2,3,1,1,4];
$nums = [3,2,1,0,4];
$ret = (new Solution())->canJump($nums);
var_dump($ret);