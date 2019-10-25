<?php

class Solution {

    protected $flag = [];
    protected $peopleNum = 0;

    /**
     * @param Integer[][] $M
     * @return Integer
     */
    function findCircleNum($M)
    {
        $this->peopleNum = count($M);
        $this->flag = array_fill(0, $this->peopleNum, false);

        $count = 0;
        for ($i = 0; $i < $this->peopleNum; $i++) {
            if (!$this->flag[$i]) {
                $this->dfs($M, $i);
                $count++;
            }
        }

        return $count;
    }

    protected function dfs($M, $i)
    {
        $this->flag[$i] = true;

        for ($j = 0; $j < $this->peopleNum; $j++) {
            if (!$this->flag[$j] && $M[$i][$j]) {
                $this->dfs($M, $j);
            }
        }
    }
}

$M = [[1,1,0],
    [1,1,0],
    [0,0,1]];

echo (new Solution())->findCircleNum($M);
