<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $p1 = $l1;
        $p2 = $l2;

        $p = new ListNode(0);
        $ret = $p;
        while (!is_null($p1) && !is_null($p2)) {
            if ($p1->val < $p2->val) {
                $p->next = $p1;
                $p1 = $p1->next;
            } else {
                $p->next = $p2;
                $p2 = $p2->next;
            }
            $p = $p->next;
        }

        $p->next = is_null($p1) ? $p2 : $p1;

        return $ret->next;
    }
}

$l1 = make([]);
$l2 = make([]);
$ret = (new Solution())->mergeTwoLists($l1, $l2);
printList($ret);
