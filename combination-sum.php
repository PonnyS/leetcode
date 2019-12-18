<?php

class Solution {

    protected $result = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target)
    {
        $list = [];

        sort($candidates);
        $this->backtrack($candidates, $target, 0, $list);
        return $this->result;
    }

    protected function backtrack($candidates, $target, $start, $list)
    {
        if ($target < 0) {
            return ;
        }
        if ($target == 0) {
            array_push($this->result, $list);
            return ;
        }

        for ($i = $start; $i < count($candidates); $i++) {
            if ($target < $candidates[$i]) {
                break;
            }

            array_push($list, $candidates[$i]);
            $this->backtrack($candidates, $target-$candidates[$i], $i, $list);
            array_pop($list);
        }
    }
}

$candidates = [2,3,6,7];
$target = 7;
$ret = (new Solution())->combinationSum($candidates, $target);

foreach ($ret as $value) {
    echo implode(',', $value).PHP_EOL;
}
