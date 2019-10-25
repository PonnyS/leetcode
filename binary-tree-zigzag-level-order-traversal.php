<?php

require 'tree_node.php';

class Solution {

    protected $orders = [];

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root)
    {
        $this->levelOrder($root, 0);

        return $this->orders;
    }

    public function levelOrder($root, $level)
    {
        if ($root === null) {
            return ;
        }

        if (count($this->orders) === $level) {
            $this->orders[$level] = [];
        }

        $isLeftOrder = $level % 2;

        if ($isLeftOrder) {
            array_push($this->orders[$level], $root->val);
        } else {
            array_unshift($this->orders[$level], $root->val);
        }

        $this->levelOrder($root->right, $level + 1);
        $this->levelOrder($root->left, $level + 1);
    }
}
