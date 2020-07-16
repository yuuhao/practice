<?php


namespace practice\algorithm;

/**
 * 编辑距离
 * 1. 拉文斯坦距离： 经过删除，替换，增加，两个字符串相同时所需的操作次数
 * 2. 最长公共子串长度： 只允许删除，增加操作
 * 【求解两个字符串的编辑距离】、
 * 思路：
 *  整个求解过程中，涉及多个决策阶段，依次考察一个字符串中的每个字符，跟另一个字符串中的字符是否匹配
 *  如果匹配如何处理，不匹配如何处理， 符合多阶段最优模型
 *  匹配： 直接双双跳过
 *  不匹配：
 *      可以删除a[i] 然后递归考察a[i + 1] 和b[j]
 *      可以删除b[j] 然后递归考察a[i] 和b[j + 1]
 *      可以在a[i] 前添加一个b[j] 然后递归考察a[i + 1] 和 b[j]
 *      可以在b[j] 前添加一个a[i] 然后递归考察a[i] 和 b[j + 1]
 *      可与进行a[i]和b【j】 互相替换 递归考察a[i + 1] 和 b[j + 1]
*/
class EditDist
{
    private $a = 'mitcmu';

    private $b =  'mtacnu';

    private $lenA;

    private $lenB;

    private $minDist;

    public function __construct()
    {
        $this->lenA =  strlen($this->a);
        $this->lenB =  strlen($this->b);
    }

    /**
     * 回溯法
     * 莱文斯坦
     * @param $i
     * @param $j
     * @param $edist
     */
    public function lwstBT($i, $j, $edist)
    {
        if ($i == $this->lenA || $j == $this->lenB) {
            if ($i < $this->lenA) $edist += ($this->lenA - $i);
            if ($j < $this->lenB) $edist += ($this->lenB - $j);
            if ($edist < $this->minDist) $this->minDist = $edist;
            return;
        }

        if ($this->a[$i] == $this->b[$j]) {
            $this->lwstBT($i + 1, $j + 1, $edist);
        } else {
            $this->lwstBT($i, $j + 1, $edist + 1);
            $this->lwstBT($i + 1, $j, $edist + 1);
            $this->lwstBT($i + 1, $j + 1, $edist + 1);
        }
    }

    /**
     * 状态转移方程：
     *  如果a[i] != b[j] 那么min_dist(i, j) 就等于
     *  min(min_dist(i - 1, j) + 1, min_edist(i,j-1)+1, min_edist(i-1,j-1)+1))
     * 如果：a[i]==b[j]，那么：min_edist(i, j)就等于：
     * min(min_edist(i-1,j)+1, min_edist(i,j-1)+1，min_edist(i-1,j-1))
     *
     * 动态规划实现，先
     *  1. 写出状态转移方程
     *  2. 初始化状态 数组
    */

    public function lwstDP()
    {
        $state = [];
        if ($this->a[0] == $this->b[0]) {
            $state[0][0] = 0;
        } else {
            $state[0][0] = 1;
        }
        for ($i = 1; $i < $this->lenA; $i++) {
            if ($this->a[$i] == $this->b[0]) {
                $state[0][$i] = $state[0][$i - 1];
            } else {
                $state[0][$i] = $state[0][$i - 1] + 1;
            }
        }

        for ($j = 1; $i < $this->lenB; $j++) {
            if ($this->b[$j] == $this->a[0]) {
                $state[$j][0] = $state[$j - 1][0];
            } else {
                $state[$j][0] = $state[$j - 1][0] + 1;
            }
        }

        for ($i = 1; $i < $this->lenA; $i++) {
            for ($j = 1; $i < $this->lenB; $j++) {
                if ($this->a[$i] == $this->b[$j]) {
                    $state[$i][$j] = min(
                $state[$i - 1][$j] + 1,
                $state[$i][$j - 1] + 1,
                         $state[$i - 1][$j - 1]);
                } else {
                    $state[$i][$j] = min(
                        $state[$i - 1][$j],
                        $state[$i][$j - 1],
                        $state[$i - 1][$j - 1]) + 1;
                }
            }
        }
    }
}