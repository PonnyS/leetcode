<?php

require 'tree_node.php';

class Solution {

    protected $max = 0;

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function diameterOfBinaryTree($root)
    {
        $this->depth($root);

        return $this->max;
    }

    public function depth($root)
    {
        if ($root === null) {
            return 0;
        }

        $leftDepth = $this->depth($root->left);
        $rightDepth = $this->depth($root->right);

        $this->max = max($this->max, $leftDepth + $rightDepth);

        return max($leftDepth, $rightDepth) + 1;
    }
}
