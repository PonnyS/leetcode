<?php

class LinkedNode
{
    public $val;
    public $next;

    public function __construct($val)
    {
        $this->val = $val;
    }
}

class MyLinkedList {
    /**
     * @var LinkedNode
     */
    protected $head;

    /**
     * @var LinkedNode
     */
    protected $tail;

    protected $length = 0;

    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->head = new LinkedNode(0);
        $this->tail = $this->head->next;
    }

    /**
     * Get the value of the index-th node in the linked list. If the index is invalid, return -1.
     * @param Integer $index
     * @return Integer
     */
    function get($index) {
        if ($index >= $this->length) {
            return -1;
        } elseif ($this->length - $index === 1) {
            return $this->tail->val;
        }

        $p = $this->head->next;
        while ($index--) {
            $p = $p->next;
        }

        return $p->val;
    }

    /**
     * Add a node of value val before the first element of the linked list. After the insertion, the new node will be the first node of the linked list.
     * @param Integer $val
     * @return NULL
     */
    function addAtHead($val) {
        $node = new LinkedNode($val);
        $node->next = $this->head->next;
        $this->head->next = $node;
        $this->tail = $this->tail ?? $node;
        $this->length++;
    }

    /**
     * Append a node of value val to the last element of the linked list.
     * @param Integer $val
     * @return NULL
     */
    function addAtTail($val) {
        $node = new LinkedNode($val);
        $this->tail->next = $node;
        $this->tail = $node;
        $this->length++;
    }

    /**
     * Add a node of value val before the index-th node in the linked list. If index equals to the length of linked list, the node will be appended to the end of linked list. If index is greater than the length, the node will not be inserted.
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     */
    function addAtIndex($index, $val) {
        if ($index > $this->length) {
            return ;
        }
        if ($this->length == $index) {
            $this->tail->next = new LinkedNode($val);
            $this->tail = $this->tail->next;
            $this->length++;
            return ;
        }

        $p = $this->head;
        while ($index--) {
            $p = $p->next;
        }
        $node = new LinkedNode($val);
        $node->next = $p->next;
        $p->next = $node;
        $this->length++;
    }

    /**
     * Delete the index-th node in the linked list, if the index is valid.
     * @param Integer $index
     * @return NULL
     */
    function deleteAtIndex($index) {
        if ($index >= $this->length) {
            return ;
        }

        $p = $this->head;
        while ($index--) {
            $p = $p->next;
        }
        $p->next = $p->next->next;
        if (is_null($p->next)) {
            $this->tail = $p;
        }
        $this->length--;
    }
}

$obj = new MyLinkedList();
$obj->addAtHead(7);
$obj->addAtTail(2);
$obj->addAtTail(1);
$obj->addAtIndex(3, 0);
$obj->deleteAtIndex(2);
$obj->addAtTail(6);
$obj->addAtTail(4);
echo $obj->get(4);