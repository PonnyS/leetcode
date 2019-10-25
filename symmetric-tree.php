<?php

require 'tree_node.php';

class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root)
    {
        return $this->judge($root->left, $root->right);
    }

    public function judge(?TreeNode $left, ?TreeNode $right)
    {
        if ($left->val !== $right->val) {
            return false;
        }
        if (
            $left->val === null ||
            (
                $this->judge($left->left, $right->right) &&
                $this->judge($left->right, $right->left)
            )
        ) {
            return true;
        }
        return false;
    }
}
