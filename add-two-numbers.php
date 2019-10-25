<?php

require 'list_node.php';

class Solution {

    protected $count = 0;

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers($l1, $l2)
    {
        if ($l1 === null && $l2 === null && $this->count === 0) {
            return null;
        }

        if ($l1 !== null) {
            $this->count += $l1->val;
            $l1 = $l1->next;
        }

        if ($l2 !== null) {
            $this->count += $l2->val;
            $l2 = $l2->next;
        }

        $sumNode = new ListNode(0);
        $sumNode->val = $this->count % 10;
        $this->count = (int)($this->count / 10);
        $sumNode->next = $this->addTwoNumbers($l1, $l2);

        return $sumNode;
    }
}

$l1 = make([2, 4, 3]);
$l2 = make([5, 6, 4]);
$ret = (new Solution())->addTwoNumbers($l1, $l2);
printList($ret);
