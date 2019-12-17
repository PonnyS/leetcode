<?php

class Solution {

    protected $max = 0;

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland($grid)
    {
        $row = count($grid);
        $column = count($grid[0]);

        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $column; $j++) {
                if ($grid[$i][$j] === 1) {
                    $count = 0;
                    $this->dfs($grid, $count, $i, $j);
                    $this->max = max($this->max, $count);
                }
            }
        }

        return $this->max;
    }

    protected function dfs(&$grid, &$count, $i, $j)
    {
        if (!isset($grid[$i][$j]) || $grid[$i][$j] !== 1) {
            return ;
        } else {
            $grid[$i][$j] = 2;
            $count++;
        }

        $this->dfs($grid, $count, $i-1, $j);
        $this->dfs($grid, $count, $i+1, $j);
        $this->dfs($grid, $count, $i, $j-1);
        $this->dfs($grid, $count, $i, $j+1);
    }
}

$grid = [
    [0,0,1,0,0,0,0,1,0,0,0,0,0],
    [0,0,0,0,0,0,0,1,1,1,0,0,0],
    [0,1,1,0,1,0,0,0,0,0,0,0,0],
    [0,1,0,0,1,1,0,0,1,0,1,0,0],
    [0,1,0,0,1,1,0,0,1,1,1,0,0],
    [0,0,0,0,0,0,0,0,0,0,1,0,0],
    [0,0,0,0,0,0,0,1,1,1,0,0,0],
    [0,0,0,0,0,0,0,1,1,0,0,0,0]
];

echo (new Solution())->maxAreaOfIsland($grid);