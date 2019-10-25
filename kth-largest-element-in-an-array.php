<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    public function findKthLargest(array $nums, int $k)
    {
        $count = count($nums);
        if ($count === 0) {
            return -1;
        }

        $this->quickSort($nums, 0, $count - 1);

        return $nums[$count - $k];
    }

    public function quickSort(&$nums, $start, $end)
    {
        if ($start >= $end) {
            return ;
        }

        $partitionPos = $this->partition($nums, $start, $end);
        $this->quickSort($nums, $start, $partitionPos - 1);
        $this->quickSort($nums, $partitionPos + 1, $end);
    }

    public function partition(&$nums, $start, $end)
    {
        $i = $start;
        $j = $start + 1;

        while ($j <= $end) {
            if ($nums[$j] < $nums[$start]) {
                $i++;
                $tmp = $nums[$i];
                $nums[$i] = $nums[$j];
                $nums[$j] = $tmp;
            }
            $j++;
        }

        $tmp = $nums[$i];
        $nums[$i] = $nums[$start];
        $nums[$start] = $tmp;

        return $i;
    }
}
