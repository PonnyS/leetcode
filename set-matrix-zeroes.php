<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
        $modified = null;
        $column = count($matrix[0]);
        $row = count($matrix);

        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $column; $j++) {
                if ($matrix[$i][$j] === 0) {
                    for ($k = 0; $k < $row; $k++) {
                        if ($matrix[$k][$j] !== 0) {
                            $matrix[$k][$j] = $modified;
                        }
                    }
                    for ($k = 0; $k < $column; $k++) {
                        if ($matrix[$i][$k] !== 0) {
                            $matrix[$i][$k] = $modified;
                        }
                    }
                }
            }
        }

        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $column; $j++) {
                if ($matrix[$i][$j] === $modified) {
                    $matrix[$i][$j] = 0;
                }
            }
        }
    }
}

$matrix = [
    [1,0,1],
    [1,0,1],
    [1,1,1]
];
$matrix = [
    [0,1,2,0],
    [3,4,5,2],
    [1,3,1,5]
];

(new Solution())->setZeroes($matrix);
foreach ($matrix as $value) {
    echo implode(',', $value).PHP_EOL;
}