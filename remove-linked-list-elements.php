<?php

require 'list_node.php';
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function removeElements($head, $val) {
        $dummy = new ListNode(0);
        $dummy->next = $head;

        $p = $dummy;
        while (!is_null($p->next)) {
            if ($p->next->val == $val) {
                $p->next = $p->next->next;
            } else {
                $p = $p->next;
            }
        }

        return $dummy->next;
    }
}

$head = make([6,6,6,7]);
$val = 6;
$ret = (new Solution())->removeElements($head, $val);
printList($ret);
