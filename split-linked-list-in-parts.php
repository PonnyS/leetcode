<?php

require 'list_node.php';
class Solution {

    /**
     * @param ListNode $root
     * @param Integer $k
     * @return ListNode[]
     */
    function splitListToParts($root, $k)
    {
        // 求链表长度
        $p = $root;
        $length = 0;
        while (!is_null($p)) {
            $length++;
            $p = $p->next;
        }

        $everyNum = (int)floor($length / $k);
        $leftNum = $length - $everyNum * $k;

        $splitArray = [];
        $p = $root;
        while ($k--) {
            if (is_null($p)) {
                $splitArray[] = null;
                continue;
            }
            if ($leftNum > 0) {
                $totalNum = $everyNum + 1;
                $leftNum--;
            } else {
                $totalNum = $everyNum;
            }
            $node = $p;
            for ($i = 0; $i < $totalNum - 1; $i++) {
                $p = $p->next;
            }
            $next = $p->next;
            $p->next = null;
            $p = $next;
            $splitArray[] = $node;
        }

        return $splitArray;
    }
}

$root = make(range(1, 4));
$k = 5;
$ret = (new Solution())->splitListToParts($root, $k);

foreach ($ret as $value) {
    printList($value);
    echo PHP_EOL;
}
