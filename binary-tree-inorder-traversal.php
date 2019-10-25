<?php

require 'tree_node.php';

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root)
    {
        $preOrders = [];
        $this->order($root, $preOrders);

        return $preOrders;
    }

    public function order($root, &$preOrders)
    {
        if ($root == null) {
            return;
        }

        $this->order($root->left, $preOrders);
        $preOrders[] = $root->val;
        $this->order($root->right, $preOrders);
    }
}
