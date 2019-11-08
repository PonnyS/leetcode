<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @return NULL
     */
    function reorderList($head)
    {
        // 长度 <= 2
        if (is_null($head) || is_null($head->next) || is_null($head->next->next)) {
            return $head;
        }

        // 找中点，并翻转右侧链表
        $slow = $head;
        $fast = $head->next;
        while (!is_null($fast) && !is_null($fast->next)) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $newHead = $slow->next;
        $slow->next = null;
        $newHead = $this->reverse($newHead);

        // 拼接
        $p = $head;
        while (!is_null($p) && !is_null($newHead)) {
            $tmpHead = $newHead->next;

            $newHead->next = $p->next;
            $p->next = $newHead;

            $p = $p->next->next;
            $newHead = $tmpHead;
        }

        return $head;
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
$ret = (new Solution())->reorderList($head);
printList($ret);
