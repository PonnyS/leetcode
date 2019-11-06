<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @param integer $k
     * @return Boolean
     */
    function reverseKGroup($head, $k)
    {
        $dummy = new ListNode(0);
        $dummy->next = $head;

        $pre = $dummy;
        $end = $dummy;

        while (!is_null($end->next)) {
            for ($i = 0; $i < $k && !is_null($end); $i++) {
                $end = $end->next;
            }
            if (is_null($end)) {
                break;
            }

            $start = $pre->next;
            $next = $end->next;
            $end->next = null;
            $pre->next = $this->reverse($start);

            $start->next = $next;
            $pre = $start;

            $end = $pre;
        }

        return $dummy->next;
    }

    protected function reverse($head)
    {
        if (is_null($head) || is_null($head->next)) {
            return $head;
        }

        $node = $this->reverse($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $node;
    }
}

$nums = make([1,2,3,4,5,6]);
$k = 2;

$ret = (new Solution())->reverseKGroup($nums, $k);
printList($ret);

