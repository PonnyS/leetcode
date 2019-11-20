<?php


class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target)
    {
        sort($nums);

        $length = count($nums);
        $result = [];
        for ($i = 0; $i < $length - 3; $i++) {
            if ($i > 0 && $nums[$i] === $nums[$i-1]) {
                continue;
            }
            if ($nums[$i] + $nums[$i+1] + $nums[$i+2] + $nums[$i+3] > $target) {
                break;
            }
            if ($nums[$i] + $nums[$length-1] + $nums[$length-2] + $nums[$length-3] < $target) {
                continue;
            }

            for ($j = $i + 1; $j < $length - 2; $j++) {
                if ($j > $i + 1 && $nums[$j] === $nums[$j-1]) {
                    continue;
                }
                if ($nums[$i] + $nums[$j] + $nums[$j+1] + $nums[$j+2] > $target) {
                    break;
                }
                if ($nums[$i] + $nums[$j] + $nums[$length-1] + $nums[$length-2] < $target) {
                    continue;
                }

                $low = $j + 1;
                $high = $length - 1;

                while ($low < $high) {
                    $sum = $nums[$i] + $nums[$j] + $nums[$low] + $nums[$high];
                    if ($sum === $target) {
                        $result[] = [$nums[$i], $nums[$j], $nums[$low], $nums[$high]];
                        while ($low < $high && $nums[$low] === $nums[$low + 1]) {
                            $low++;
                        }
                        while ($low < $high && $nums[$high] === $nums[$high - 1]) {
                            $high--;
                        }
                        $low++;
                        $high--;
                    } elseif ($sum < $target) {
                        $low++;
                    } else {
                        $high--;
                    }
                }
            }
        }

        return $result;
    }
}


//$nums = [1, 0, -1, 0, -2, 2];
$nums = [-3,-2,-1,0,0,1,2,3];
$target = 0;
$ret = (new Solution())->fourSum($nums, $target);
var_dump($ret);