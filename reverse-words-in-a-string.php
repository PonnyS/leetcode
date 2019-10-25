<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    public function reverseWords($s)
    {
        $words = [];

        $word = '';
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] === ' ') {
                if ($word === '') {
                    continue;
                } else {
                    $words[] = $word;
                    $word = '';
                }
            } else {
                $word .= $s[$i];
            }
        }
        if ($word !== '') {
            $words[] = $word;
        }

        return implode(' ', array_reverse($words));
    }
}
