<?php

require 'tree_node.php';

class Solution {

    protected $i = 0;
    protected $k;
    protected $res = null;

    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($root, $k) {
        $this->k = $k;
        $this->recurse($root);

        return $this->res;
    }

    public function recurse($root)
    {
        if ($root === null || !is_null($this->res)) {
            return ;
        }

        $this->recurse($root->left);
        $this->i++;
        if ($this->i === $this->k) {
            $this->res = $root->val;
            return ;
        }
        $this->recurse($root->right);
    }
}

$n2 = new TreeNode(2);
$n1 = new TreeNode(1);
$n1->right = $n2;
$n4 = new TreeNode(4);
$n3 = new TreeNode(3);
$n3->left = $n1;
$n3->right = $n4;

echo (new Solution())->kthSmallest($n3, 4);

