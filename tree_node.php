<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

function printTree(?TreeNode $head)
{
    if (is_null($head)) {
        echo 'null->';
        return ;
    }

    echo $head->val . '->';
    printTree($head->left);
    printTree($head->right);
}
