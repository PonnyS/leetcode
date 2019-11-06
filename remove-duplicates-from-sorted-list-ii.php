<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head)
    {
        $map = [];

        $p = $head;
        while (!is_null($p)) {
            $map[$p->val]++;
            $p = $p->next;
        }

        $ret = new ListNode(0);
        $p = $ret;
        foreach ($map as $key => $value) {
            if ($value > 1) {
                continue;
            }
            $p->next = new ListNode($key);
            $p = $p->next;
        }

        return $ret->next;
    }
}

$head = make([5,2,3,3,4,4,1]);
$head = make([1,2,3]);
$ret = (new Solution())->deleteDuplicates($head);
printList($ret);

