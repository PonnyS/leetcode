<?php

class Node {
    public $val;
    public $prev;
    public $next;
    public $child;

    /**
     * @param Integer $val
     * @param Node $prev
     * @param Node $next
     * @param Node $child
     */
    function __construct($val, $prev, $next, $child) {
        $this->val = $val;
        $this->prev = $prev;
        $this->next = $next;
        $this->child = $child;
    }
}

class Solution {

    /**
     * @param Node $head
     * @return Node
     */
    function flatten($head) {
        $this->helper($head);
        return $head;
    }

    protected function helper($head)
    {
        $p = $head;

        while (!is_null($p->next) || !is_null($p->child)) {
            if (is_null($p->child)) {
                $p = $p->next;
                continue;
            }

            $lastChildNode = $this->helper($p->child);
            $next = $p->next;

            $lastChildNode->next = $p->next;
            $p->next->prev = $lastChildNode;

            $p->next = $p->child;
            $p->child->prev = $p;
            $p->child = null;

            $p = $next;
        }

        return $p;
    }
}

$n1 = new Node(1, null, null, null);
$n2 = new Node(2, null, null, null);
$n3 = new Node(3, null, null, null);
$n2->child = $n3;
$n1->child = $n2;

$ret = (new Solution())->flatten($n1);

var_dump($ret);