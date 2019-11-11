<?php

require 'list_node.php';

class Solution {

    protected $left = 0;

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $l1Length = $this->getLength($l1);
        $l2Length = $this->getLength($l2);

        if ($l1Length > $l2Length) {
            $gap = $l1Length - $l2Length;
            while ($gap--) {
                $node = new ListNode(0);
                $node->next = $l2;
                $l2 = $node;
            }
        } elseif ($l2Length > $l1Length) {
            $gap = $l2Length - $l1Length;
            while ($gap--) {
                $node = new ListNode(0);
                $node->next = $l1;
                $l1 = $node;
            }
        }

        $list = $this->add($l1, $l2);
        if ($this->left) {
            $node = new ListNode($this->left);
            $node->next = $list;
            $list = $node;
        }
        return $list;
    }

    protected function getLength($l)
    {
        $length = 0;
        while (!is_null($l)) {
            $length++;
            $l = $l->next;
        }

        return $length;
    }

    protected function add($l1, $l2)
    {
        if (is_null($l1->next) && is_null($l2->next)) {
            return $this->addAndCreateNode($l1->val, $l2->val);
        }

        $node = $this->add($l1->next ?? $l1, $l2->next ?? $l2);
        $newNode = $this->addAndCreateNode($l1->val, $l2->val);

        $newNode->next = $node;
        return $newNode;
    }

    protected function addAndCreateNode($val1, $val2)
    {
        $ret = $val1 + $val2 + $this->left;
        if ($ret >= 10) {
            $this->left = 1;
            return new ListNode($ret - 10);
        } else {
            $this->left = 0;
            return new ListNode($ret);
        }
    }
}

$l1 = make([7,2,4,3]);
$l2 = make([5,6,4]);
$ret = (new Solution())->addTwoNumbers($l1, $l2);
printList($ret);
