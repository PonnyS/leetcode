<?php

class Solution {

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid)
    {
        $map = [];
        $m = count($obstacleGrid[0]);
        $n = count($obstacleGrid);

        $map[0][0] = $obstacleGrid[0][0] ? 0 : 1;
        for ($i = 1; $i < $m; $i++) {
            $map[0][$i] = $obstacleGrid[0][$i] ? 0 : ($map[0][$i-1] ? 1 : 0);
        }
        for ($i = 1; $i < $n; $i++) {
            $map[$i][0] = $obstacleGrid[$i][0] ? 0 : ($map[$i-1][0] ? 1 : 0);
        }

        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                if ($obstacleGrid[$j][$i]) {
                    $map[$j][$i] = 0;
                } else {
                    $map[$j][$i] = $map[$j-1][$i] + $map[$j][$i-1];
                }
            }
        }

        return $map[$n-1][$m-1];
    }
}

$obstacleGrid = [
    [0,0,0],
    [0,1,0],
    [0,0,0]
];
$obstacleGrid = [[1,0]];
$obstacleGrid = [
    [0,1,0,0,0],
    [1,0,0,0,0],
    [0,0,0,0,0],
    [0,0,0,0,0]
];

echo (new Solution())->uniquePathsWithObstacles($obstacleGrid);
