<?php

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

function make($nums)
{
    $tmpNode = new ListNode($nums[0]);
    $list = $tmpNode;
    foreach (array_slice($nums, 1, count($nums) - 1) as $value) {
        $tmpNode = makeList($tmpNode, $value);
    }
    return $list;
}


function makeList($list, $val)
{
    $newNode = new ListNode($val);
    $list->next = $newNode;

    return $newNode;
}

function printList($list)
{
    while ($list != null) {
        echo $list->val . "->";
        $list = $list->next;
    }
    echo 'NULL';
}