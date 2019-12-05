<?php

class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {

    }
}

$candidates = [2,3,6,7];
$target = 7;
$ret = (new Solution())->combinationSum($candidates, $target);
var_dump($ret);
