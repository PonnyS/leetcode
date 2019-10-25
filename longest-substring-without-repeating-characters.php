<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        if ($s === '') {
            return 0;
        }

        $sLength = strlen($s);

        $substring = '';
        $max = $currentMax = 0;
        for ($i = 0; $i < $sLength; $i++) {
            if ( ( $pos = strpos($substring, $s[$i])) !== false ) {
                $max = max($max, $currentMax);

                $substring = substr($substring, $pos+1, $currentMax - $pos - 1);
                $currentMax = strlen($substring);
            }
            $substring .= $s[$i];
            $currentMax++;
        }
        $max = max($max, $currentMax);

        return $max;
    }
}
