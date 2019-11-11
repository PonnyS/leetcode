<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function oddEvenList($head)
    {
        if (is_null($head) || is_null($head->next) || is_null($head->next->next)) {
            return $head;
        }

        $evenList = $head->next;

        $p1 = $head;
        $p2 = $evenList;

        while (!is_null($p2) && !is_null($p2->next)) {
            $p1->next = $p2->next;
            $p2->next = $p2->next->next;

            $p1 = $p1->next;
            $p2 = $p2->next;
        }

        $p1->next = $evenList;

        return $head;
    }
}

$head = make([1,2]);
$ret = (new Solution())->oddEvenList($head);
printList($ret);
