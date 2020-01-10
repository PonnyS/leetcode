<?php

class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        if ($numRows === 0) {
            return [];
        }

        $result = [[1]];
        // 每一行的首尾都有两个1，那么可以设 i = 中间值的个数
        for ($i = 0; $i < $numRows-1; $i++) {
            $data = [1];
            for ($j = 0; $j < $i; $j++) {
                $data[] = $result[$i][$j] + $result[$i][$j+1];
            }
            $data[] = 1;
            $result[] = $data;
        }

        return $result;
    }
}

$numRows = 5;
$ret = (new Solution())->generate($numRows);
foreach ($ret as $value) {
    echo implode(' ', $value).PHP_EOL;
}
