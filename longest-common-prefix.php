<?php

class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        if (empty($strs)) {
            return '';
        }
        $strsLength = count($strs);

        $minStrLength = strlen($strs[0]);
        foreach ($strs as $str) {
            $minStrLength = min($minStrLength, strlen($str));
        }

        $commonPrefix = '';
        for ($i = 0; $i < $minStrLength; $i++) {
            $tmp = $strs[0][$i];
            for ($j = 0; $j < $strsLength; $j++) {
                if ($strs[$j][$i] !== $tmp) {
                    return $commonPrefix;
                }
            }
            $commonPrefix .= $tmp;
        }

        return $commonPrefix;
    }
}

$strs = ["flower","flow","flight"];
$strs = ["dog","racecar","car"];
echo (new Solution())->longestCommonPrefix($strs);
