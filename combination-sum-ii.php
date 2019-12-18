<?php

class Solution {

    protected $result = [];
    protected $target;

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target)
    {
        $list = [];
        $this->target = $target;

        sort($candidates);
        $this->backtrack($candidates, 0, 0, $list);
        return $this->result;
    }

    protected function backtrack($candidates, $start, $sum, $list)
    {
        if ($this->target === $sum) {
            array_push($this->result, $list);
            return ;
        }

        for ($i = $start; $i < count($candidates); $i++) {
            if ($sum + $candidates[$i] > $this->target) {
                break ;
            }
            if ($i > $start && $candidates[$i] === $candidates[$i-1]) {
                continue;
            }

            array_push($list, $candidates[$i]);
            $this->backtrack($candidates, $i+1, $sum+$candidates[$i], $list);
            array_pop($list);
        }
    }
}

$candidates = [2,5,2,1,2];
$target = 5;
$ret = (new Solution())->combinationSum2($candidates, $target);
foreach ($ret as $value) {
    echo implode(',', $value).PHP_EOL;
}
