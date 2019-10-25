<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function reverseList($head)
    {
        if (is_null($head) || is_null($head->next)) {
            return $head;
        }

        $node = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $node;
    }
}

$head = make([1,2,3,4,5]);
$ret = (new Solution())->reverseList($head);
printList($ret);

