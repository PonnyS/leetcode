<?php

class Solution {

    protected $ans = [];

    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */
    function combinationSum3($k, $n) {
        $this->backtrack($k, $n, 1, 0, []);

        return $this->ans;
    }

    protected function backtrack($k, $n, $start, $sum, $list)
    {
        if ($k === 0) {
            if ($sum === $n) {
                $this->ans[] = $list;
                return;
            }
        }

        for ($i = $start; $i < 10; $i++) {
            $list[] = $i;
            $this->backtrack($k-1, $n, $i+1, $sum+$i, $list);
            array_pop($list);
        }
    }
}

$k = 3;
$n = 9;
$ret = (new Solution())->combinationSum3($k, $n);

foreach ($ret as $value) {
    echo implode(',', $value).PHP_EOL;
}
