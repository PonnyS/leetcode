<?php

require 'list_node.php';
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function insertionSortList($head) {
        if (is_null($head) || is_null($head->next)) {
            return $head;
        }


        $p = $head->next;
        $sortedList = $head;
        $sortedList->next = null;
        while (!is_null($p)) {
            $next = $p->next;
            $p->next = null;
            $sortedList = $this->insert($sortedList, $p);
            $p = $next;
        }

        return $sortedList;
    }

    protected function insert($head, $node)
    {
        $dummy = new ListNode(0);
        $dummy->next = $head;

        $p = $dummy;
        while (!is_null($p->next)) {
            if ($p->next->val > $node->val) {
                $node->next = $p->next;
                $p->next = $node;
                return $dummy->next;
            }
            $p = $p->next;
        }
        $p->next = $node;

        return $dummy->next;
    }
}

$head = make([5,-1]);
$ret = (new Solution())->insertionSortList($head);
printList($ret);
