<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        $numLength = count($nums);
        if ($numLength < 3) {
            return [];
        }

        $result = [];
        sort($nums);

        for ($k = 0; $k < $numLength - 2; $k++) {
            if ($nums[$k] > 0) {
                break;
            }
            if ($k > 0 && $nums[$k] === $nums[$k - 1]) {
                continue;
            }

            $i = $k + 1;
            $j = $numLength - 1;
            while ($i < $j) {
                $add = $nums[$k] + $nums[$i] + $nums[$j];
                if ($add === 0) {
                    $key = sprintf("%d_%d_%d", $nums[$k], $nums[$i], $nums[$j]);
                    $result[$key] = [$nums[$k], $nums[$i], $nums[$j]];
                    $i++;
                    $j--;
                } elseif ($add > 0) {
                    $j--;
                } else {
                    $i++;
                }
            }
        }

        return array_values($result);

//        for ($i = 0; $i < $numLength - 2; $i++) {
//            if ($nums[$i] > 0) {
//                break;
//            }
//
//            for ($j = $i + 1; $j < $numLength - 1; $j++) {
//                $need = 0 - ($nums[$i] + $nums[$j]);
//                for ($z = $j + 1; $z < $numLength; $z++) {
//                    if ($need === $nums[$z]) {
//                        $key = sprintf("%d_%d_%d", $nums[$i], $nums[$j], $nums[$z]);
//                        if (isset($map[$key])) {
//                            break;
//                        }
//                        $result[] = [$nums[$i], $nums[$j], $nums[$z]];
//                        $map[$key] = true;
//                    } elseif ($need < $nums[$z]) {
//                        break;
//                    }
//                }
//            }
//        }
    }
}

$nums = [-1, 0, 1, 2, -1, -4];
$nums = [-1, -1 , 0];
$nums = [0, 0, 0];
$ret = (new Solution())->threeSum($nums);

var_dump($ret);
