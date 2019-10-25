<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums)
    {
        if (empty($nums)) {
            return 0;
        }

        $numLength = count($nums);
        $sortedNums = $this->mergeSort($nums, 0, $numLength - 1);

        $max = 0;
        $tmpLength = 0;
        for ($i = 0; $i < $numLength - 1; $i++) {
            $gap = $sortedNums[$i+1] - $sortedNums[$i];

            if ($gap === 1) {
                $tmpLength++;
            } elseif ($gap === 0) {
                continue;
            } else {
                $max = max($max, $tmpLength);
                $tmpLength = 0;
            }
        }
        $max = max($max, $tmpLength);

        return $max + 1;
    }

    public function mergeSort($nums, $start, $end)
    {
         if ($start >= $end) {
             return [$nums[$start]];
         }

         $middle = (int)(($start + $end) / 2);
         $left = $this->mergeSort($nums, $start, $middle);
         $right = $this->mergeSort($nums, $middle + 1, $end);

         return $this->merge($left, $right);
    }

    public function merge($left, $right)
    {
        $leftLength = count($left);
        $rightLength = count($right);

        $i = $j = 0;
        $data = [];
        while ($i < $leftLength && $j < $rightLength) {
            if ($left[$i] < $right[$j]) {
                $data[] = $left[$i];
                $i++;
            } else {
                $data[] = $right[$j];
                $j++;
            }
        }

        if ($i === $leftLength) {
            $data = array_merge($data, array_slice($right, $j, $rightLength - $j));
        } elseif ($j === $rightLength) {
            $data = array_merge($data, array_slice($left, $i, $leftLength - $i));
        }

        return $data;
    }
}

$nums = [100, 4, 200, 1, 3, 2];
$nums = [1,2,0,1];
$nums = [9,1,4,7,3,-1,0,5,8,-1,6];
echo (new Solution())->longestConsecutive($nums);
