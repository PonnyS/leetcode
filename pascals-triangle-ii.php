<?php

class Solution {

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) {
        if ($rowIndex === 0) {
            return [1];
        }

        $pre = [1];
        for ($i = 0; $i < $rowIndex; $i++) {
            $data = [1];
            for ($j = 0; $j < $i; $j++) {
                $data[] = $pre[$j] + $pre[$j+1];
            }
            $data[] = 1;
            $pre = $data;
        }

        return $pre;
    }
}

$rowIndex = 3;
$ret = (new Solution())->getRow($rowIndex);
echo implode(' ', $ret).PHP_EOL;
