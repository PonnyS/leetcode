<?php

class Solution {

    /**
     * @param String $s
     * @return String[]
     */
    function restoreIpAddresses($s)
    {
        $length = strlen($s);
        if ($length < 4 || $length > 12) {
            return [];
        }

        $data = [];
        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                for ($y = 1; $y <= 3; $y++) {
                    for ($z = 1; $z <= 3; $z++) {
                        // 长度判断
                        if ( ($i + $j + $y + $z) !== $length) {
                            continue;
                        }

                        // 值判断
                        $iStr = substr($s, 0, $i);
                        $jStr = substr($s, $i, $j);
                        $yStr = substr($s, $i + $j, $y);
                        $zStr = substr($s, $i + $j + $y, $z);
                        if ($iStr <= 255 && $jStr <= 255 && $yStr <= 255 && $zStr <= 255) {
                            if (
                                ($iStr !== '0' && $iStr[0] == 0) ||
                                ($jStr !== '0' && $jStr[0] == 0) ||
                                ($yStr !== '0' && $yStr[0] == 0) ||
                                ($zStr !== '0' && $zStr[0] == 0)
                            ) {
                                continue;
                            }

                            $data[] = sprintf("%s.%s.%s.%s",$iStr,$jStr,$yStr,$zStr);
                        }
                    }
                }
            }
        }

        return $data;
    }
}
$address = '25525511135';
// $address = '0000';
// $address = '010010';

$object = new Solution();
$result = $object->restoreIpAddresses($address);

var_dump($result);
