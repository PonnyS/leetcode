<?php

class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2)
    {
        if ($num1 === '0' || $num2 === '0') {
            return '0';
        }

        $length1 = strlen($num1);
        $length2 = strlen($num2);

        $data = [];
        for ($i = $length1 - 1; $i >= 0; $i--) {
            for ($j = $length2 - 1; $j >= 0; $j--) {
                $tmp = $num1[$i] * $num2[$j] + $data[$i + $j + 1];
                $data[$i + $j + 1] = $tmp % 10;
                $data[$i + $j] += (int)($tmp/10);
            }
        }

        $ret = '';
        for ($i = 0; $i < count($data); $i++) {
            if ($i === 0 && $data[0] === 0) {
                continue;
            }
            $ret .= (string)$data[$i];
        }

        return $ret;
    }
}

$num1 = "45";
$num2 = "123";

echo (new Solution())->multiply($num1, $num2);
