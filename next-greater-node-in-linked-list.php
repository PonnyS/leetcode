<?php

require 'list_node.php';
class Solution {

    /**
     * @param ListNode $head
     * @return Integer[]
     */
    function nextLargerNodes($head)
    {
        $result = [];
        $stack = [];

        $count = 0;
        while (!is_null($head)) {
            array_push($result, 0);

            while (!empty($stack)) {
                $last = end($stack);
                if ($head->val <= $last[0]) {
                    reset($stack);
                    break;
                }

                $result[$last[1]] = $head->val;
                reset($stack);
                array_pop($stack);
            }

            array_push($stack, [$head->val, $count++]);
            $head = $head->next;
        }

        return $result;
    }
}

$head = make([2,1,5]);
$head = make([1,7,5,1,9,2,5,1]);
$head = make([9,7,6,7,6,9]);
//$head = make([4,3,2,5,1,8,10]);
$ret = (new Solution())->nextLargerNodes($head);
var_dump($ret);