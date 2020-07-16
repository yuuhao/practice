<?php


namespace practice\algorithm;

/**
 * 01背包问题，在固定的背包容积下，有一组质量不同不可分割的物体， 如何装才能使背包内质量最大
 *
*/
class Bao
{
    public $maxW; // 将结果放入该值
    public $maxV; // 将最大价值
    public $weight;//物品质量
    public $n; // 物品个数
    public $w; // 背包承受最大重量
    public $value;//每个物品对应质量

    public $mem; //将计算的结果存储起来

    public function __construct()
    {
        $this->w = 8;//背包最大放入质量为8
        $this->weight = [2,2,4,6,3];
        $this->n = count($this->weight);
    }

    /**
     * 回溯法
     * 对应每个物品都有放入与不放入两种情况
     * @param $i  //第i个物品抉择
     * @param $cw //第i个物品前的背包总重量
     */
    public function hui($i, $cw)
    {
        //cw = w表示背包放满了，i=n表示物品放完了
        if ($cw == $this->w || $i == $this->n) {
            if ($cw > $this->maxW) $this->maxW = $cw;
            return;
        }
        //抉择第i+1个不放入背包
        $this->hui($i + 1, $cw);
        //选择第 i+1个放入背包
        if ($cw + $this->weight[$i + 1] <= $this->w) {
            $this->hui($i + 1, $cw + $this->weight[$i + 1]);
        }
    }

    /**
     * 回溯优化
     * 在递归树中，会出现子问题重复计算的 问题，可以使用一个备忘录功能，将以计算过的结果进行存储起来
     * @param $i
     * @param $cw
     */
    public function hui_1($i, $cw)
    {
        if ($cw == $this->w || $i == $this->n) {
            if ($cw > $this->maxW) $this->maxW = $cw;
            return;
        }
        //如果有值，表明这个被计算过，并且不是优解
        if (isset($this->mem[$i][$cw])) {
            return;
        }
        $this->mem[$i][$cw] = true;

        $this->hui_1($i + 1, $cw);
        if ($cw + $this->weight[$i + 1] <= $this->w) {
            $this->hui_1($i + 1, $cw + $this->weight[$i + 1]);
        }
    }


    /**
     * 动态规划： 在初步使用递归方案中，找出规律，用迭代的形式给出方案
     *      状态转移数组（由递归树解析）
     *      状态转移方程
     * 背包问题，当递归树的每一次合并重复值时，这每一层的节点个数最大不会超过 $w个
     * @param $weight //物品质量数组
     * @param $n //数组个数
     * @param $w //背包最大质量数
     * @return int
     */
    public function knapsack($weight, $n, $w)
    {
        $state = [];
        $state[0][0] = true;// 第一行的数据要特殊处理，可以利用哨兵优化
        if ($weight[0] <= $w) {
            $state[0][$weight[0]] = true;
        }

        for ($i = 0; $i < $n; ++$i) { // 动态规划状态转移
            for ($j = 0; $j <= $w;  ++$j) { //不把第i个物品放入背包
                if ($state[$i - 1][$j] == true) $state[$i][$j] = $state[$i - 1][$j];
            }
            for ($j = 0; $j <= $w - $weight[$i];  ++$j) { //把第i个物品放入背包
                if ($state[$i - 1][$j] == true) $state[$i][$j + $weight[$i]] = true;
            }
        }

        for ($ii = $w;  $ii >= 0; --$ii) {
            if ($state[$n - 1][$ii] == true) return $ii;
        }
        return 0;
    }

    /**
     * 一组物品，每个物品的价值不同，质量不同
     * 在背包w容量下，求出能装进去的最大价值
     * 回溯法
     * @param $i
     * @param $cw
     * @param $cv
     */
    public function hui_2($i, $cw, $cv)
    {
        if ($i == $this->n || $cw == $this->w) { //介绍递归条件
            if ($cv > $this->maxV) $this->maxV = $cv;
            return;
        }

        //不放入
        $this->hui_2($i + 1,  $cw, $cv);
        if ($cw + $this->weight[$i + 1] <= $this->w) {
            $this->hui_2($i + 1, $cw + $this->weight[$i + 1], $cv + $this->value[$i+ 1]);
        }
    }

    /**
     * 动态规划之迭代
     * 不同物体，不同质量，在背包中最大价值
    */
    public function knapsack2()
    {
        $state = [];
        // 第一个的情况，不放
        $state[0][0] = 0;
        //如果第一个物品质量小于w，放入的情况
        if ($this->weight[0] <= $this->w) {
            $state[0][$this->weight[0]] = $this->value[0];
        }

        for ($i = 1; $i < $this->n; $i++) {
            for ($j = 0; $j <= $this->w; $j++) {
                if (isset($state[$i - 1][$j])) $state[$i][$j] = $state[$i - 1][$j];
            }
            for ($j = 0; $j <= $this->w - $this->weight[$j]; $j ++) {
                if (isset($state[$i - 1][$j]) && (!isset($state[$i][$j]) || $state[$i - 1][$j] + $this->value[$i])) {
                    $state[$i][$j + 1] = $state[$i][$j];
                }
            }
        }
    }
}