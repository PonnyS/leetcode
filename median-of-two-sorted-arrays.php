<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $nums = array_merge($nums1, $nums2);
        sort($nums);
        $length = count($nums);
        if ($length % 2 === 0) {
            $mid = (int)floor($length / 2);
            return ($nums[$mid] + $nums[$mid - 1])/2;
        } else {
            $mid = $length / 2;
            return $nums[$mid];
        }
    }
}

$nums1 = [];
$nums2 = [2];
echo (new Solution())->findMedianSortedArrays($nums1, $nums2);
