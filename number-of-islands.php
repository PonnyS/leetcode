<?php

class Solution
{
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    public function numIslands($grid)
    {
        $row = count($grid);
        $column = count($grid[0]);

        $count = 0;
        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $column; $j++) {
                // 简化、逻辑清晰：只要是 1，就 count++
                if ($grid[$i][$j] == '1') {
                    $this->dfs($grid, $i, $j);
                    $count++;
                }
            }
        }

        return $count;
    }

    protected function dfs(&$grid, $i, $j)
    {
        if ($grid[$i][$j] != '1') {
            return ;
        }

        // 省去了标志数组
        $grid[$i][$j] = '2';
        $this->dfs($grid, $i, $j-1);
        $this->dfs($grid, $i, $j+1);
        $this->dfs($grid, $i+1, $j);
        $this->dfs($grid, $i-1, $j);
    }
}

$grid = [
    ["1","1","0","0","0"],
    ["1","1","0","0","0"],
    ["0","0","1","0","0"],
    ["0","0","0","1","1"]
];

echo (new Solution())->numIslands($grid);