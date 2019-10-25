<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    function getPermutation($n, $k) {
        $nums = range(1, $n);
        $length = 1;
        for ($i = 1; $i <= $n; $i++) {
            $length *= $i;
        }

        $permutation = '';
        for ($i = $n; $i >= 1; $i--) {
            $length = $length / $i;
            $result = (int)($k / $length);
            $left = $k - $result * $length;

            if ($left == 0) {
                $permutation .= $nums[$result - 1];
                $k = $left + $length;
                unset($nums[$result - 1]);
            } else {
                $permutation .= $nums[$result];
                $k = $left;
                unset($nums[$result]);
            }
            $nums = array_values($nums);
        }

        return $permutation;
    }
}

$n = 3;
$k = 3;

echo (new Solution())->getPermutation($n, $k);
