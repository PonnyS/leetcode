<?php

class Solution {

    public function threeSumClosest($nums, $target)
    {
        $length = count($nums);
        $closet = $nums[0] + $nums[1] + $nums[2];

        sort($nums);
        for ($i = 0; $i < $length - 2; $i++) {
            $start = $i + 1;
            $end = $length - 1;
            while ($start < $end) {
                $tmp = $nums[$i] + $nums[$start] + $nums[$end];
                if ($tmp === $target) {
                    return $target;
                } elseif ($tmp > $target) {
                    $end--;
                } else {
                    $start++;
                }
                if (abs($tmp - $target) < abs($closet - $target)) {
                    $closet = $tmp;
                }
            }
        }

        return $closet;
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosestV2($nums, $target)
    {
        $length = count($nums);
        if ($length < 3) {
            return 0;
        } elseif ($length === 3) {
            return $nums[0] + $nums[1] + $nums[2];
        }
        sort($nums);

        $closet = null;
        for ($i = 0; $i < $length - 2; $i++) {
            for ($j = $i + 1; $j < $length - 1; $j++) {
                $need = $target - $nums[$i] - $nums[$j];

                $tmpClosest = null;
                for ($w = $j + 1; $w < $length; $w++) {
                    if ($nums[$w] === $need) {
                        return $target;
                    } elseif ($nums[$w] > $need) {
                        if ($w == $j + 1) {
                            $tmpClosest = $nums[$i] + $nums[$j] + $nums[$w];
                        } elseif (abs($nums[$w] - $need) < abs($nums[$w-1] - $need)) {
                            $tmpClosest = $nums[$i] + $nums[$j] + $nums[$w];
                        } else {
                            $tmpClosest = $nums[$i] + $nums[$j] + $nums[$w - 1];
                        }
                        break;
                    }
                }
                if (is_null($tmpClosest)) {
                    $tmpClosest = $nums[$i] + $nums[$j] + $nums[$w - 1];
                }
                if (is_null($closet)) {
                    $closet = $tmpClosest;
                } else if (abs($tmpClosest - $target) < abs($closet - $target)) {
                    $closet = $tmpClosest;
                }
            }
        }

        return $closet;
    }
}

$nums = [-4,-1,1,2];
$nums = [-5,-4,-3,-2,3];
$target = -1;
echo (new Solution())->threeSumClosest($nums, $target);
