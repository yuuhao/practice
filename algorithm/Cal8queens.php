<?php


namespace practice\algorithm;


class Cal8queens
{
    public $result = []; // int;count = 8，全局或者成员变量，下标表示行，值表示queen存储在那一列

    public function cal8queens($row)
    {
        if ($row == 8) { // 8个旗子都放置好了，打印结果
            $this->printQueens($this->result);
            return;
        }
        for ($column = 0; $column < 8; ++$column) { // 每一行都有8种放法
            if ($this->isOk($row, $column)) {
                $this->result[$row] = $column; // 第row行的棋子放在column列
                $this->cal8queens($row + 1);
            }
        }
    }

    private function isOk($row, $column) // 判断row行column列放置是否合适
    {
        /**当前位置的左右列位置*/
        $leftUp = $column - 1;
        $rightUp = $column + 1;

        for ($i = $row - 1; $i >= 0; $i--) { // 往上考察每一行
            if($this->result[$i] == $column) return false;//第i行的column有棋子吗
            if ($leftUp >= 0) {
                if ($this->result[$i] == $leftUp) return false;
            }
            if ($rightUp < 8) {
                if ($this->result[$i] == $rightUp) return false;
            }
            --$leftUp; ++$rightUp;
        }
        return true;
    }

    private function printQueens($result) {
        for ($row = 0; $row < 8; ++$row) {
            for ($column = 0; $column < 8; ++$column) {
                if ($result[$row] == $column) print 'Q ';
                else print '*  ';
            }
            print "\n";
        }
        print "\n";
    }
}