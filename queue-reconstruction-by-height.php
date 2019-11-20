<?php

class MyListNode {
    public $next;

    /**
     * @var array
     */
    public $val;

    public function __construct(array $val)
    {
        $this->val = $val;
    }
}

class Solution {

    /**
     * @param Integer[][] $people
     * @return Integer[][]
     */
    function reconstructQueue($people)
    {
        usort($people, function ($a, $b) {
            if ($a[0] === $b[0]) {
                return $a[1] <=> $b[1];
            }
            return $b[0] <=> $a[0];
        });

        $index = range(0, count($people)-1);
        $arr = [];

        foreach($people as $v){
            $key = array_splice($index,$v[1],1);
            $arr[$key[0]] = $v;
        }
        ksort($arr);
        return $arr;

        $dummy = new MyListNode([0,0]);
        foreach ($people as $item) {
            $p = $dummy;
            $count = 0;
            while (!is_null($p->next)) {
                if ($p->next->val[0] >= $item[0]) {
                    if ($item[1] === 0) {
                        break;
                    }
                    $count++;
                }

                $p = $p->next;
                if ($count === $item[1]) {
                    break;
                }
            }
            $node = new MyListNode($item);
            $node->next = $p->next;
            $p->next = $node;
        }

        $result = [];
        $p = $dummy->next;
        while (!is_null($p)) {
            $result[] = $p->val;
            $p = $p->next;
        }

        return $result;
    }
}

$people = [[7,0], [4,4], [7,1], [5,0], [6,1], [5,2]];
$ret = (new Solution())->reconstructQueue($people);

foreach ($ret as $value) {
    echo implode(',', $value).PHP_EOL;
}
