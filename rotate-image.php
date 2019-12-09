<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix) {
        $length = count($matrix);

        // 先左对角线反转
        for ($i = 0; $i < $length; $i++) {
            for ($j = $i; $j < $length; $j++) {
                $tmp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$j][$i];
                $matrix[$j][$i] = $tmp;
            }
        }

        // 以中线为分割，交换对方
        $mid = (int)($length/2);
        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $mid; $j++) {
                $tmp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$i][$length-$j-1];
                $matrix[$i][$length-$j-1] = $tmp;
            }
        }
    }
}

$matrix = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];
(new Solution())->rotate($matrix);

foreach ($matrix as $value) {
    echo implode(',', $value).PHP_EOL;
}
