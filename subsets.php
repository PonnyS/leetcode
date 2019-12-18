<?php

class Solution {

    protected $result = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums)
    {
        $list = [];

        $this->backtrack($nums, 0, $list);

        return $this->result;
    }

    protected function backtrack($nums, $start, $tmp)
    {
        $this->result[] = $tmp;

        for ($j = $start; $j < count($nums); $j++) {
            $tmp[] = $nums[$j];
            $this->backtrack($nums, $j+1, $tmp);
            array_pop($tmp);
        }
    }
}

$nums = [1,2,3];
$ret = (new Solution())->subsets($nums);
foreach ($ret as $value) {
    echo implode(',', $value).PHP_EOL;
}
