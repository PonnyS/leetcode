<?php

require 'tree_node.php';

class Solution {

    protected $max = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root)
    {
        if ($root === null) {
            return 0;
        }
        $this->depth($root);

        return $this->max + 1;
    }

    public function depth($root)
    {
        if ($root === null) {
            return 0;
        }

        $leftDepth = $this->depth($root->left);
        $rightDepth = $this->depth($root->right);

        $this->max = max($this->max, $leftDepth, $rightDepth);

        return max($leftDepth, $rightDepth) + 1;
    }
}