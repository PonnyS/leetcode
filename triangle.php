<?php

class Solution {

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {
        for ($i = count($triangle)-2; $i >= 0; $i--) {
            for ($j = 0; $j < count($triangle[$i]); $j++) {
                $triangle[$i][$j] = min($triangle[$i+1][$j], $triangle[$i+1][$j+1]) + $triangle[$i][$j];
            }
        }

        return $triangle[0][0];
    }
}

$triangle = [
    [2],
    [3,4],
    [6,5,7],
    [4,1,8,3]
];

echo (new Solution())->minimumTotal($triangle);
