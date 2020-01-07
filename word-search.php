<?php

class Solution {

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word)
    {
        $this->helper($board, $word, 0, '');
    }

    protected function helper($board, $word, $start, $tmp)
    {
        for ($i = $start; $i < strlen($word); $i++) {
            $tmp .= $board[$i];

            $this->helper($board, $word, $i + 1);
        }
    }
}

$board =
    [
        ['A','B','C','E'],
        ['S','F','C','S'],
        ['A','D','E','E']
    ];
$word = 'ABCCED';
$ret = (new Solution())->exist($board, $word);
var_dump($ret);