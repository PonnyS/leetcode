<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head)
    {
        $dummy = new ListNode(0);
        $dummy->next = $head;

        $pre = $dummy;
        $end = $dummy;
        $length = 0;
        while (!is_null($end) && !is_null($end->next)) {
            $length++;
            $end = $end->next;
            if ($length % 2 === 0) {
                $start = $pre->next;
                $next = $end->next;
                $end->next = null;

                $pre->next = $this->swap($start);
                $start->next = $next;

                $pre = $start;
                $end = $start;
            }
        }

        return $dummy->next;
    }

    protected function swap($head)
    {
        $next = $head->next;

        $next->next = $head;
        $head->next = null;

        return $next;
    }
}

$head = make([1]);
$ret = (new Solution())->swapPairs($head);
printList($ret);
