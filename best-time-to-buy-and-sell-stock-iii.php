<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $min = PHP_INT_MAX;
        $profitArr = [];

        for ($i = 0; $i < count($prices); $i++) {
            if ($prices[$i] < $min) {
                // 比最小还小，此时是不能买的
                $min = $prices[$i];
            } elseif ($prices[$i] > $prices[$i+1]) {
                // 如果后期出现下跌，那现在就可以卖了
                $profitArr[] = $prices[$i] - $min;
                $min = PHP_INT_MAX;
            }
        }

        rsort($profitArr);

        return $profitArr[0] + $profitArr[1] ?? 0;
    }
}

$prices = [3,3,5,0,0,3,1,4];
$prices = [1,2,4,2,5,7,2,4,9,0];

echo (new Solution())->maxProfit($prices);
