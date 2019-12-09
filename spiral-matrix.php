<?php

class Solution {

    protected $result = [];

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        $n = count($matrix);
        $m = count($matrix[0]);
        $this->helper($matrix, 0, $m - 1, 0, $n - 1);

        return $this->result;
    }

    protected function helper($matrix, $mMin, $mMax, $nMin, $nMax)
    {
        if ($mMin > $mMax || $nMin > $nMax) {
            return ;
        }

        if ($nMin === $nMax) {
            for ($i = $mMin; $i <= $mMax; $i++) {
                $this->result[] = $matrix[$nMin][$i];
            }
            return ;
        }

        if ($mMin === $mMax) {
            for ($i = $nMin; $i <= $nMax; $i++) {
                $this->result[] = $matrix[$i][$mMin];
            }
            return ;
        }

        // 0,0 -> 0,2
        for ($i = $mMin; $i <= $mMax; $i++) {
            $this->result[] = $matrix[$mMin][$i];
        }

        // 0,2 -> 2,2
        for ($i = $nMin + 1; $i <= $nMax; $i++) {
            $this->result[] = $matrix[$i][$mMax];
        }

        // 2,2 -> 2,0
        for ($i = $mMax - 1; $i >= $mMin; $i--) {
            $this->result[] = $matrix[$nMax][$i];
        }

        // 2,0 -> 0,0
        for ($i = $nMax - 1; $i > $nMin; $i--) {
            $this->result[] = $matrix[$i][$nMin];
        }

        $this->helper($matrix, $mMin+1, $mMax-1, $nMin+1, $nMax-1);
    }
}

$matrix = [
    [ 1, 2, 3 ],
    [ 4, 5, 6 ],
    [ 7, 8, 9 ]
];
$matrix = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9,10,11,12]
];
$matrix = [
    [7],
    [6],
    [9]
];

$matrix = [
    [1,2,3,4,5,6,7,8,9,10],
    [11,12,13,14,15,16,17,18,19,20]
];

$ret = (new Solution())->spiralOrder($matrix);

echo implode(',', $ret);
