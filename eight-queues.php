<?php

class Solution {

    protected $result = [];
    protected $n = 0;
    protected $finish = 0;

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n)
    {
        $this->n = $n;
        $this->calculate(0);

        return $this->makeResult();
    }

    protected function calculate($row)
    {
        if ($row === $this->n) {
            $this->finish = 1;
            return ;
        }

        for ($column = 0; $column < $this->n; $column++) {
            if ($this->isOk($row, $column)) {
                $this->result[$row] = $column;
                $this->calculate($row+1);
                if ($this->finish) {
                    return ;
                }
            }
        }
    }

    protected function isOk($row, $column)
    {
        $leftUp = $column - 1;
        $rightUp = $column + 1;

        for ($i = $row - 1; $i >= 0; $i--) {
            // 当前列
            if ($this->result[$i] === $column) {
                return false;
            }
            // 左上角
            if ($leftUp >=0 && $this->result[$i] === $leftUp) {
                return false;
            }
            // 右上角
            if ($rightUp < $this->n && $this->result[$i] === $rightUp) {
                return false;
            }
            $leftUp--;
            $rightUp++;
        }

        return true;
    }

    protected function makeResult()
    {
        $ret = [];
        for ($row = 0; $row < $this->n; $row++) {
            $str = '';
            for ($column = 0; $column < $this->n; $column++) {
                if ($this->result[$row] === $column) {
                    $str .= 'Q ';
                } else {
                    $str .= '. ';
                }
            }
            $ret[] = $str;
        }

        return $ret;
    }
}

$n = 8;
$ret = (new Solution())->solveNQueens($n);

foreach ($ret as $value) {
    echo $value.PHP_EOL;
}
