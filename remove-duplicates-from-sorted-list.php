<?php

require 'list_node.php';
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head)
    {
        $dummy = new ListNode(0);
        $dummy->next = $head;

        $map = [];
        $p = $dummy;
        while (!is_null($p->next)) {
            if (isset($map[$p->next->val])) {
                $p->next = $p->next->next;
                continue;
            }
            $map[$p->next->val] = true;
            $p = $p->next;
        }

        return $dummy->next;
    }
}

$head = make([1,1,2,3,3,5,6,5,1]);
$ret = (new Solution())->deleteDuplicates($head);
printList($ret);