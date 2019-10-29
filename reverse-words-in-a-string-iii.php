<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s)
    {
        $tmp = '';
        $reverseWords = '';
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == ' ') {
                $reverseWords .= strrev($tmp) . $s[$i];
                $tmp = '';
            } else {
                $tmp .= $s[$i];
            }
        }
        $reverseWords .= strrev($tmp);

        return $reverseWords;
    }
}

$s = "Let's take LeetCode contest";
echo (new Solution())->reverseWords($s);
