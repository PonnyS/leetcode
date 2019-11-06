<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x)
    {
        $length = 0;

        $p2 = $head;
        while (!is_null($p2->next)) {
            $length++;
            $p2 = $p2->next;
        }
        $length++;

        $dummy = new ListNode(0);
        $dummy->next = $head;

        $p1 = $dummy;
        while ($length--) {
            if ($p1->next->val < $x) {
                $p1 = $p1->next;
            } else {
                $p2->next = $p1->next;
                $p1->next = $p1->next->next;
                $p2->next->next = null;
                $p2 = $p2->next;
            }
        }

        return $dummy->next;
    }
}

$head = make([4,1,3,2,5,2]);
$x = 3;
//$head = make([2,3]);
//$x = 1;

$ret = (new Solution())->partition($head, $x);
printList($ret);
