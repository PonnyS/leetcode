<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n) {
        $nums1 = array_merge(array_slice($nums1, 0, $m), array_slice($nums2, 0, $n));
        sort($nums1);
    }
}

$nums1 = [1,2,3,0,0,0];
$m = 3;
$nums2 = [2,5,6];
$n = 3;
(new Solution())->merge($nums1, $m, $nums2, $n);
echo implode(',', $nums1);
