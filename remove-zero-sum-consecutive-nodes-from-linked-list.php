<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function removeZeroSumSublists($head) {
        $dummy = new ListNode(0);
        $dummy->next = $head;

        $prefixSum = [];
        $p = $dummy;
        $count = 0;
        while (!is_null($p)) {
            $count += $p->next->val;
            if (isset($prefixSum[$count])) {
                $tmpNode = $prefixSum[$count]->next;
                $node = $prefixSum[$count];
                $node->next = $p->next->next;

                // 消除
                $p = $p->next;
                $tmpCount = $count;
                while ($tmpNode !== $p) {
                    $tmpCount += $tmpNode->val;
                    unset($prefixSum[$tmpCount]);
                    $tmpNode = $tmpNode->next;
                }
            } elseif ($count === 0) {
                $dummy->next = $p->next->next;
            } else {
                $prefixSum[$count] = $p->next;
            }

            $p = $p->next;
        }

        return $dummy->next;
    }
}

//$head = make([1,2,3,-3,-2]);
//$head = make([1,-1]);
$head = make([1,3,2,-3,-2,5,5,-5,1]);
$ret = (new Solution())->removeZeroSumSublists($head);
printList($ret);

