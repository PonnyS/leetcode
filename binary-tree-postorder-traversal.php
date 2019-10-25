<?php

require 'tree_node.php';

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal($root)
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
        $this->order($root->right, $preOrders);
        $preOrders[] = $root->val;
    }
}
