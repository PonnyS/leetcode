<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2)
    {
        $s1Length = strlen($s1);
        $s2Length = strlen($s2);

        $charArr1 = $charArr2 = [];
        for ($i = 0; $i < $s1Length; $i++) {
            $charArr1[$s1[$i]]++;
            $charArr2[$s2[$i]]++;
        }

        for ($i = 0; $i <= $s2Length - $s1Length; $i++) {
            if ($this->isSame($charArr1, $charArr2)) {
                return true;
            }

            $charArr2[ $s2[$i] ]--;
            $charArr2[ $s2[$i+$s1Length] ]++;
        }

        return false;
    }

    public function isSame($charArr1, $charArr2)
    {
        foreach ($charArr1 as $key => $value) {
            if ($charArr2[$key] !== $value) {
                return false;
            }
        }

        return true;
    }
}

$s1 = "adc";
$s2 = "dcda";

$ret = (new Solution())->checkInclusion($s1, $s2);
var_dump($ret);
