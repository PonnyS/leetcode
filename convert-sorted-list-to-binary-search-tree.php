<?php

require 'list_node.php';
require 'tree_node.php';

class Solution {

    protected $map = [];
    protected $headLength = 0;

    /**
     * @param ListNode $head
     * @return TreeNode
     */
    function sortedListToBST($head)
    {
        $p = $head;
        while (!is_null($p)) {
            $this->headLength++;
            $this->map[] = $p->val;
            $p = $p->next;
        }

        return $this->helper(0, $this->headLength - 1);
    }

    protected function helper($start, $end)
    {
        if ($start >= $end) {
            return new TreeNode($this->map[$start]);
        }
        $mid = (int)floor(($start + $end) / 2);

        $node = new TreeNode($this->map[$mid]);
        $node->left = $mid === $start ? null : $this->helper($start, $mid - 1);
        $node->right = $mid === $end ? null : $this->helper($mid + 1, $end);

        return $node;
    }
}

$head = make([-10, -3, 0, 5, 9]);
//$head = make([1,2,3,4,5]);
$ret = (new Solution())->sortedListToBST($head);

printTree($ret);