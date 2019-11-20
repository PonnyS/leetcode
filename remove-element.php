<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val)
    {
        sort($nums);
        $length = count($nums);
        for ($i = 0; $i < $length; $i++) {
            if ($nums[$i] === $val) {
                unset($nums[$i]);
            }
        }
    }
}

$nums = [0,1,2,2,3,0,4,2];
$val = 2;
(new Solution())->removeElement($nums, $val);
var_dump($nums);
