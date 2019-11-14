<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $stack = [];

        $stackLength = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($this->isCouple($stack[$stackLength - 1], $s[$i])) {
                array_pop($stack);
                $stackLength--;
                continue;
            }
            array_push($stack, $s[$i]);
            $stackLength++;
        }

        return empty($stack);
    }

    protected function isCouple($s, $compare)
    {
        switch ($s) {
            case '(':
                return $compare === ')';
            case '[':
                return $compare === ']';
            case '{':
                return $compare === '}';
            default:
                return false;
        }
    }
}

$s = '([)]';
$ret = (new Solution())->isValid($s);
var_dump($ret);
