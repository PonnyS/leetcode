<?php

require 'tree_node.php';

class Solution {

    protected $preOrder;
    protected $index = 0;
    protected $preOrderLength;

    /**
     * @param Integer[] $preorder
     * @return TreeNode
     */
    function bstFromPreorder($preorder)
    {
        $this->preOrder = $preorder;
        $this->preOrderLength = count($preorder);

        return $this->helper(PHP_INT_MIN, PHP_INT_MAX);
    }

    public function helper($lower, $upper)
    {
        if ($lower >= $upper) {
            return null;
        }

        $value = $this->preOrder[$this->index];
        if ($value < $lower || $value > $upper) {
            return null;
        }

        $this->index++;
        $node = new TreeNode($value);
        $node->left = $this->helper($lower, $value);
        $node->right = $this->helper($value, $upper);

        return $node;
    }
}

$preorder = [8,5,1,7,10,12];
$ret = (new Solution())->bstFromPreorder($preorder);

var_dump($ret);
