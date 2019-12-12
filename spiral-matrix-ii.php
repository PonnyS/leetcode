<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n)
    {
        $l = 0;
        $r = $n - 1;
        $t = 0;
        $b = $n - 1;

        $num = 1;
        $max = $n * $n;
        $result = [];
        while ($num <= $max) {
            // left -> right
            for ($i = $l; $i <= $r; $i++) {
                $result[$t][$i] = $num;
                $num++;
            }

            // right -> bottom
            for ($i = $t + 1; $i <= $b; $i++) {
                $result[$i][$r] = $num;
                $num++;
            }

            // right -> left
            for ($i = $r - 1; $i >= $l; $i--) {
                $result[$b][$i] = $num;
                $num++;
            }

            // bottom -> top
            for ($i = $b - 1; $i > $t; $i--) {
                $result[$i][$l] = $num;
                $num++;
            }
            $l++;
            $r--;
            $t++;
            $b--;
        }

        for ($i = 0; $i < $n; $i++) {
            ksort($result[$i]);
        }

        return $result;
    }
}

$n = 3;
$ret = (new Solution())->generateMatrix($n);
foreach ($ret as $value) {
    echo implode(',', $value).PHP_EOL;
}
