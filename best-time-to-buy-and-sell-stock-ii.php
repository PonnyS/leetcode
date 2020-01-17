<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $min = PHP_INT_MAX;
        $profitSum = 0;

        for ($i = 0; $i < count($prices); $i++) {
            if ($prices[$i] < $min) {
                // 比最小还小，此时是不能买的
                $min = $prices[$i];
            } elseif ($prices[$i] > $prices[$i+1]) {
                // 如果后期出现下跌，那现在就可以卖了
                $profitSum += $prices[$i] - $min;
                $min = PHP_INT_MAX;
            }
        }

        return $profitSum;
    }
}

$prices = [7,6,4,3,1];

echo (new Solution())->maxProfit($prices);
