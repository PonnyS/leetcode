<?php

class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board)
    {
        $row = count($board);
        $column = count($board[0]);

        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $column; $j++) {
                $isEdge = $i === 0 || $j === 0 || $i === $row-1 || $j === $column-1;
                if ($isEdge && $board[$i][$j] === 'O') {
                    $this->dfs($board, $i, $j);
                }
            }
        }

        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $column; $j++) {
                if ($board[$i][$j] === 'O') {
                    $board[$i][$j] = 'X';
                } elseif ($board[$i][$j] === '#') {
                    $board[$i][$j] = 'O';
                }
            }
        }
    }

    protected function dfs(&$board, $i, $j)
    {
        if (!isset($board[$i][$j]) || $board[$i][$j] !== 'O') {
            return ;
        }

        $board[$i][$j] = '#';
        $this->dfs($board, $i-1, $j);
        $this->dfs($board, $i+1, $j);
        $this->dfs($board, $i, $j-1);
        $this->dfs($board, $i, $j+1);
    }
}

$board = [
    ['X', 'X', 'X', 'X'],
    ['X', 'O', 'O', 'X'],
    ['X', 'X', 'O', 'X'],
    ['X', 'O', 'X', 'X'],
];

(new Solution())->solve($board);

foreach ($board as $value) {
    echo implode(',', $value).PHP_EOL;
}
