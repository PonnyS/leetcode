<?php

require 'list_node.php';

class Solution {

    protected $length = -1;
    protected $n;

    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n)
    {
        $this->n = $n;

        $dummy = new ListNode(0);
        $dummy->next = $head;
        $this->helper($dummy);

        return $dummy->next;
    }

    protected function helper($head)
    {
        $this->length++;
        $count = $this->length;
        if (is_null($head->next)) {
            return ;
        }

        $this->helper($head->next);
        if ($this->length - $count === $this->n) {
            $head->next = $head->next->next;
            return ;
        }
    }
}

$head = make([1,2,3,4,5]);
$n = 5;
$ret = (new Solution())->removeNthFromEnd($head, $n);
printList($ret);
