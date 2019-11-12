<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @param Integer[] $G
     * @return Integer
     */
    function numComponents($head, $G) {
        $numComponents = 0;
        $p = $head;
        $showed = false;
        while (!is_null($p)) {
            if (in_array($p->val, $G)) {
                $showed = true;
                $p = $p->next;
                continue;
            }
            if ($showed) {
                $numComponents++;
                $showed = false;
            }
            $p = $p->next;
        }
        if ($showed) {
            $numComponents++;
        }

        return $numComponents;
    }
}

$head = make([0,1,2,3,4]);
$G = [0,2,4];
$ret = (new Solution())->numComponents($head, $G);
echo $ret;
