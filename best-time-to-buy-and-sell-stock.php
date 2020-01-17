<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $minPrice = PHP_INT_MAX;
        $maxProfit = 0;

        // 首先绘制一张趋势图，此题即寻找谷底和谷峰
        for ($i = 0; $i < count($prices); $i++) {
            if ($prices[$i] < $minPrice) {
                // 比最小还小，此时是不能买的
                $minPrice = $prices[$i];
            } elseif ($prices[$i] - $minPrice > $maxProfit) {
                // 如果比最小大，可以买，此时比较下
                $maxProfit = $prices[$i] - $minPrice;
            }
        }

        return $maxProfit;
    }
}

$prices = [7,1,5,3,6,4];
echo (new Solution())->maxProfit($prices);
