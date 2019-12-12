<?php

class Solution {

    protected $target;

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target)
    {
        $row = count($matrix);
        $column = count($matrix[0]);

        $this->target = $target;
        for ($i = 0; $i < $row; $i++) {
            if ($target > $matrix[$i][0] && $target < $matrix[$i][$column-1]) {
                // 二分查找
                 return $this->search($matrix[$i], 0, $column-1);
            } elseif ($target === $matrix[$i][0] || $target === $matrix[$i][$column-1]) {
                return true;
            }
        }

        return false;
    }

    protected function search($nums, $start, $end)
    {
        if ($start > $end) {
            return false;
        }

        $mid = (int)floor(($start+$end)/2);
        if ($nums[$mid] === $this->target) {
            return true;
        } elseif ($nums[$mid] < $this->target) {
            return $this->search($nums, $mid + 1, $end);
        } else {
            return $this->search($nums, $start, $mid - 1);
        }
    }
}

$matrix = [
    [1,   3,  5,  7],
    [10, 11, 16, 20],
    [23, 30, 34, 50]
];
$target = 100;

$ret = (new Solution())->searchMatrix($matrix, $target);
var_dump($ret);