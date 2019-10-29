<?php

require 'list_node.php';

class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        // 获取链表长度，以及最后一个节点
        $p = $head;
        $len = 0;
        $last = null;
        while ($p->next !== null) {
            $len++;
            $p = $p->next;
        }
        $last = $p;
        $len++;

        $step = $len - $k % $len;
        if ($step === 0 || $step === $len) {
            return $head;
        }

        $p = $head;
        while (--$step) {
            $p = $p->next;
        }
        $right = $p->next;
        $p->next = null;
        $last->next = $head;

        return $right;
    }
}

$head = make([1,2,3,4,5]);
$k = 2;
$head = make([1]);
$k = 1;

$ret = (new Solution())->rotateRight($head, $k);
printList($ret);