<?php

class Node {
    public $val;
    public $next;
    public $random;

    /**
     * @param Integer $val
     * @param Node $next
     * @param Node $random
     */
    function __construct($val, $next, $random) {
        $this->val = $val;
        $this->next = $next;
        $this->random = $random;
    }
}

class Solution {

    /**
     * @param Node $head
     * @return Node
     */
    function copyRandomList($head)
    {
        if (is_null($head)) {
            return $head;
        }

        // 在每个原始节点的后面放置 clone 的节点
        // 这样就成了 原始-clone 相邻的链表
        $p = $head;
        while (!is_null($p)) {
            $node = new Node($p->val, null, null);
            $node->next = $p->next;
            $p->next = $node;
            $p = $node->next;
        }

        // 遍历链表，设置 clone 节点的 random
        $p = $head;
        while (!is_null($p)) {
            $p->next->random = $p->random->next;
            $p = $p->next->next;
        }

        // 将新老两个链表分开，这样不用引入额外的空间
        $old = $head;
        $new = $head->next;
        $copyList = $head->next;
        while (!is_null($old)) {
            $old->next = $old->next->next;
            $new->next = $new->next->next;
            $old = $old->next;
            $new = $new->next;
        }

        return $copyList;
    }
}

$node1 = new Node(1, null, null);
$node2 = new Node(2, null, null);
