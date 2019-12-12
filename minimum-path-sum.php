<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid)
    {
        $map = [];
        $m = count($grid[0]);
        $n = count($grid);

        $map[0][0] = $grid[0][0];
        for ($i = 1; $i < $m; $i++) {
            $map[0][$i] = $map[0][$i-1] + $grid[0][$i];
        }
        for ($i = 1; $i < $n; $i++) {
            $map[$i][0] = $map[$i-1][0] + $grid[$i][0];
        }

        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                $map[$j][$i] = $grid[$j][$i] + min($map[$j-1][$i], $map[$j][$i-1]);
            }
        }

        return $map[$n-1][$m-1];
    }
}

$grid = [
    [1,3,1],
    [1,5,1],
    [4,2,1]
];

echo (new Solution())->minPathSum($grid);
