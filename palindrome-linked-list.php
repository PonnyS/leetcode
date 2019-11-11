<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @return Boolean
     */
    function isPalindrome($head)
    {
        if (is_null($head) || is_null($head->next)) {
            return true;
        }

        // 快慢指针找出中间点
        $slow = $head;
        $fast = $head->next;
        while (!is_null($fast) && !is_null($fast->next)) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $head2 = $slow->next;
        $slow->next = null;

        // 有半部分反转
        $head2 = $this->reverse($head2);

        // 按位比较两部分是否相等
        $p1 = $head;
        $p2 = $head2;
        while (!is_null($p1) && !is_null($p2)) {
            if ($p1->val != $p2->val) {
                return false;
            }
            $p1 = $p1->next;
            $p2 = $p2->next;
        }

        return true;
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

$head = make([1,2,3,3,2,1,1]);
$ret = (new Solution())->isPalindrome($head);
var_dump($ret);
