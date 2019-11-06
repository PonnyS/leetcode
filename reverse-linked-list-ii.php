<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @param Integer $m
     * @param Integer $n
     * @return ListNode
     */
    function reverseBetween($head, $m, $n)
    {
        if ($m === $n) {
            return $head;
        }

        $dummy = new ListNode(0);
        $dummy->next = $head;

        $p = $dummy;
        for ($i = 1; $i < $m; $i++) {
            $p = $p->next;
        }
        $start = $p->next;

        $end = $start;
        for ($i = $m; $i < $n; $i++) {
            $end = $end->next;
        }

        $next = $end->next;
        $end->next = null;
        $p->next = $this->reverse($start);
        $start->next = $next;

        return $dummy->next;
    }

    protected function reverse($head)
    {
        if (is_null($head->next)) {
            return $head;
        }

        $node = $this->reverse($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $node;
    }
}

$head = make([1,2,3,4,5]);
$m = 1;
$n = 2;
$ret = (new Solution())->reverseBetween($head, $m, $n);
printList($ret);
