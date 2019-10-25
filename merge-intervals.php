<?php

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals)
    {
        usort($intervals, function ($a, $b) {
            return $a[0] <=> $b[0];
        });

        $length = count($intervals);
        $i = 0;
        $data = [];
        while ($i < $length) {
            $left = $intervals[$i][0];
            $right = $intervals[$i][1];

            while ($i < $length - 1 && $intervals[$i+1][0] <= $right) {
                $right = max($right, $intervals[$i+1][1]);
                $i++;
            }
            $data[] = [$left, $right];
            $i++;
        }

        return $data;
    }
}

$intervals = [[1,3],[2,6],[8,10],[15,18]];
$ret = (new Solution())->merge($intervals);
var_dump($intervals);
