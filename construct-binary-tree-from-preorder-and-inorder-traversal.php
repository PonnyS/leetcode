<?php

require 'tree_node.php';

class Solution {

    protected $preorder;
    protected $inorder;
    protected $inMap = [];

    protected $preIndex = 0;

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        $this->preorder = $preorder;
        $this->inorder = $inorder;

        // 1. 遍历前序数组，并结合当前元素在中序数组中的位置
        foreach ($inorder as $key => $value) {
            $this->inMap[$value] = $key;
        }

        return $this->helper(0, count($preorder));
    }

    protected function helper($start, $end)
    {
        if ($start === $end) {
            return null;
        }

        // 2. 当前元素作为树节点
        $rootValue = $this->preorder[$this->preIndex++];
        $node = new TreeNode($rootValue);

        // 4. 前序节点的元素在中序数组中，其左侧决定左子树，右侧决定有字数
        $inIndex = $this->inMap[$rootValue];

        // 3. 构建左右子树
        // 5. start -> inIndex; inIndex+1 -> end
        $node->left = $this->helper($start, $inIndex);
        $node->right = $this->helper($inIndex+1, $end);

        return $node;
    }
}

$preorder = [3,9,20,15,7];
$inorder = [9,3,15,20,7];

$ret = (new Solution())->buildTree($preorder, $inorder);
printTree($ret);
