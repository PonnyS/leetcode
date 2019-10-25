<?php

require 'tree_node.php';

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root)
    {
        $preOrders = [];
        $this->order($root, $preOrders);

        return $preOrders;
    }

    public function order($root, &$preOrders)
    {
        if ($root == null) {
            return ;
        }

        $preOrders[] = $root->val;
        $this->order($root->left, $preOrders);
        $this->order($root->right, $preOrders);
    }
}
