<?php

/**
 * 双向链表节点
 */
class Node
{
    /**
     * @var Node
     */
    public $next;

    /**
     * @var Node
     */
    public $prev;

    public $key;
    public $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}

/**
 * 双向链表
 */
class DoubleList
{
    /**
     * @var Node
     */
    public $head;

    /**
     * @var Node
     */
    public $tail;

    /**
     * @var int
     */
    protected $size;

    public function __construct()
    {
        $this->size = 0;

        $this->head = new Node(0, 0);
        $this->tail = new Node(0, 0);

        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;
    }

    public function addFirst(Node $newNode)
    {
        $newNode->next = $this->head->next;
        $newNode->prev = $this->head;
        $this->head->next->prev = $newNode;
        $this->head->next = $newNode;

        $this->size++;
    }

    public function remove(Node $node)
    {
        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
        $this->size--;
    }

    public function removeLast(): ?Node
    {
        $last = $this->tail->prev;
        if ($last === $this->head) {
            return null;
        }

        $this->remove($last);
        return $last;
    }

    public function size(): int
    {
        return $this->size;
    }

    public function print()
    {
        $ptr = $this->head->next;

        while ($ptr !== $this->tail)  {
            echo sprintf("(%s, %s) -> ", $ptr->key, $ptr->value);
            $ptr = $ptr->next;
        }
        echo PHP_EOL;
    }
}

/**
 * LRU
 */
class LRUCache
{
    /**
     * @var int
     */
    protected $capacity;

    /**
     * @var DoubleList
     */
    protected $doubleList;

    /**
     * @var Node[]
     */
    protected $map = [];

    public function __construct(int $capacity)
    {
        $this->capacity = $capacity;
        $this->doubleList = new DoubleList();
    }

    public function get($key)
    {
        // 获取数据
        if (!isset($this->map[$key])) {
            return -1;
        }

        $this->put($key, $this->map[$key]->value);
        return $this->map[$key]->value;
    }

    public function put($key, $value)
    {
        $newNode = new Node($key, $value);

        if (isset($this->map[$key])) {
            $this->doubleList->remove($this->map[$key]);
            $this->doubleList->addFirst($newNode);
        } else {
            if ($this->doubleList->size() >= $this->capacity) {
                $node = $this->doubleList->removeLast();
                unset($this->map[$node->key]);
            }
            $this->doubleList->addFirst($newNode);
        }

        $this->map[$key] = $newNode;
    }

    public function print()
    {
        $this->doubleList->print();
    }
}
