<?php

require 'tree_node.php';

class Solution {

    protected $levels = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function levelOrder($root)
    {
        $this->helper($root, 0);
        return $this->levels;
    }

    public function helper($root, $level)
    {
        if ($root === null) {
            return ;
        }

        if (count($this->levels) === $level) {
            $this->levels[$level] = [];
        }

        $this->levels[$level][] = $root->val;
        if ($root->left !== null) {
            $this->helper($root->left, $level + 1);
        }
        if ($root->right !== null) {
            $this->helper($root->right, $level + 1);
        }
    }
}
