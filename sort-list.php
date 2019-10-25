<?php

require 'list_node.php';

class Solution
{
    /**
     * 归并排序
     *
     * @param ListNode $head
     * @return ListNode
     */
    public function sortList(ListNode $head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }

        // 快慢指针
        $slow = $head;
        $fast = $head->next;
        while ($fast != null && $fast->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        // 递归
        $rightList = $slow->next;
        $slow->next = null;
        $left = $this->sortList($head);
        $right = $this->sortList($rightList);

        // 排序
        $sortedList = new ListNode(0);
        $res = $sortedList;
        while ($left !== null && $right !== null) {
            if ($left->val < $right->val) {
                $sortedList->next = $left;
                $left = $left->next;
            } else {
                $sortedList->next = $right;
                $right = $right->next;
            }
            $sortedList = $sortedList->next;
        }

        $sortedList->next = $left !== null ? $left : $right;

        return $res->next;
    }
}
