<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function searchRange($nums, $target)
    {
        $first = $this->findFirst($nums, $target);
        $last = $this->findLast($nums, $target);

        if ($first === -1 && $last === -1) {
            return [-1,-1];
        } elseif ($first === -1 && $last !== -1) {
            return [$last, $last];
        } elseif ($first !== -1 && $last === -1) {
            return [$first, $first];
        } else {
            return [$first, $last];
        }
    }

    protected function findFirst($nums, $target)
    {
        $left = 0;
        $right = count($nums);

        while ($left < $right) {
            $mid = (int)floor(($left+$right)/2);
            if ($nums[$mid] === $target) {
                $right = $mid;
            } elseif ($nums[$mid] < $target) {
                $left = $mid+1;
            } elseif ($nums[$mid] > $target) {
                $right = $mid;
            }
        }

        return $nums[$left] === $target ? $left : -1;
    }

    protected function findLast($nums, $target)
    {
        $left = 0;
        $right = count($nums);

        while ($left < $right) {
            $mid = (int)floor(($left+$right)/2);
            if ($nums[$mid] === $target) {
                $left = $mid + 1;
            } elseif ($nums[$mid] < $target) {
                $left = $mid + 1;
            } elseif ($nums[$mid] > $target) {
                $right = $mid;
            }
        }

        return $nums[$left - 1] === $target ? $left - 1 : -1;
    }
}

$nums = [5,7,7,8,8,10];
$target = 7;
$nums = [1,2,3,3,3,3,4,5,9];
$target = 6;
$ret = (new Solution())->searchRange($nums, $target);
var_dump($ret);
