<?php

class Solution {

    protected $result = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums) {
        sort($nums);
        $this->backtrace($nums, 0, []);
        return $this->result;
    }

    protected function backtrace($nums, $start, $tmp)
    {
        $this->result[] = $tmp;

        for ($i = $start; $i < count($nums); $i++) {
            if ($i > $start && $nums[$i] === $nums[$i-1]) {
                continue;
            }
            $tmp[] = $nums[$i];
            $this->backtrace($nums, $i+1, $tmp);
            array_pop($tmp);
            if ($nums[$i] === $nums[$i+1]) {
                $i++;
            }
        }
    }
}

$nums = [1,2,2];
$ret = (new Solution())->subsetsWithDup($nums);
foreach ($ret as $value) {
    echo implode(',', $value).PHP_EOL;
}
