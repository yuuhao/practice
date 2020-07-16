<?php


namespace practice\algorithm;

/**
 * 最长公共子串长度
 * 编辑距离的一种
 * 查找两个字符串的最大公共字符串
 * 容许的操作为删除和新增，
 * 思路：
 *  从头循环比较 a, b 两个字符串
 *  1.如果a[i]和b[j] 相同，那么继续比较a【i - 1】 和 b[j - 1]
 *  2.如果a[i] 和b[j]不相同
 *      可以删除a[i] 或者 在b[j] 前加上a[i] 然后 比较 a[i + 1] 和 b[j]
 *      可以删除b[i] 或者 在a[i] 前加上b[j] 然后 比较 a[i] 和 b[j + 1]
*/
class LCS
{
    public $state = [];

    public $a;

    public $b;

    public $lenA;

    public $lenB;

    public function __construct($a, $b)
    {
        $this->a  = $a;
        $this->b = $b;
        $this->lenA = strlen($a);
        $this->lenB = strlen($b);
    }

    public function lcs()
    {
        //初始化状态数组。 state(i,j,max_lcs),
        $this->state[0][0] = 0;
        if ($this->a[0] == $this->b[0]) {
            $this->state[0][0] = 1;
        }

        for ($i = 1; $i < $this->lenA; $i++) {
            if ($this->a[$i] == $this->b[0]) {
                $this->state[0][$i]  = $this->state[0][$i - 1] + 1;
            } else {
                $this->state[0][$i]  = $this->state[0][$i - 1];
            }
        }

        for ($j = 1; $j < $this->lenB; $j++) {
            if ($this->b[$j] == $this->a[0]) {
                $this->state[$j][0]  = $this->state[$j - 1][0] + 1;
            } else {
                $this->state[$j][0]  = $this->state[$j - 1][0];
            }
        }
        for ($i = 1; $i < $this->lenA; $i++) {
            for ($j = 1; $j < $this->lenB; $j++) {
                if ($this->b[$j] == $this->a[$j]) {
                    $this->state[$j][$i]  = $this->state[$j - 1][$i - 1] + 1;
                } else {
                    $this->state[$j][$i]  = max($this->state[$j][$i - 1], $this->state[$j - 1][$i]);
                }
            }
        }
        return $this->state[$this->lenA - 1][$this->lenB - 1];
    }
}