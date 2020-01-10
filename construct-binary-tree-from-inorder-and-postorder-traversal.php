<?php

require 'tree_node.php';

class Solution {

    protected $inorder;
    protected $postorder;

    protected $inMap = [];
    protected $postIndex;

    /**
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) {
        $this->inorder = $inorder;
        $this->postorder = $postorder;

        foreach ($inorder as $key => $value) {
            $this->inMap[$value] = $key;
        }

        $this->postIndex = count($postorder) - 1;
        return $this->helper(0, $this->postIndex, 0, $this->postIndex);
    }

    protected function helper($is, $ie, $ps, $pe)
    {
        if ($is > $ie || $ps > $pe) {
            return null;
        }

        $root = $this->postorder[$pe];
        $ri = $this->inMap[$root];

        $node = new TreeNode($root);
        // 中序数组左子树：左=is、右=ri-1
        // 后序数组左子树：左=ps、右=ps+len(左子树)=ps+(ri-1-is)
        // 中序数组右子树：左=ri+1、右=ie
        // 后序数组右子树：左=len(左子树)+1=ps+ri-is、右=pe-1
        $node->left = $this->helper($is, $ri-1, $ps, $ps+$ri-$is-1);
        $node->right = $this->helper($ri+1, $ie, $ps+$ri-$is, $pe-1);

        return $node;
    }
}

$inorder = [9,3,15,20,7];
$postorder = [9,15,7,20,3];

$ret = (new Solution())->buildTree($inorder, $postorder);
printTree($ret);
