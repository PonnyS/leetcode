<?php

require 'list_node.php';
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head) {
        if (is_null($head->next)) {
            return $head;
        }

        $slow = $head;
        $fast = $head;
        while (!is_null($fast) && !is_null($fast->next)) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return $slow;
    }
}

$head = make([1,2,3,4]);
$ret = (new Solution())->middleNode($head);
echo $ret->val;
