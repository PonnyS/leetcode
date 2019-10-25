<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $map = [];

        foreach ($nums as $key => $value) {
            $need = $target - $value;

            if (isset($map[$need])) {
                return [$key, $map[$need]];
            }

            $map[$value] = $key;
        }

        return [];
    }
}
