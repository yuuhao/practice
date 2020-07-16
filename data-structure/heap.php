<?php
/**
 * Created by PhpStorm.
 * User: yuhao
 * Date: 2019/5/17
 * Time: 23:07
 */

namespace practice\data;

// 堆，一种二叉树的实现，根部小于其余节点的叫最小堆(min heap),
// 根部节点大于其余节点的叫最大堆
// 为方便堆的操作，存储堆的数组 首位存入占位符， 那么下标为i的左节点为2i,右节点为2i + 1

class Heap
{
    public $arr;//存放堆
    
    public $count;//定义堆的大小

    public function __construct($count)
    {
        $this->count = $count;
    }

    /**
     * 往堆中插入数据
     * 自下而上进行堆化
     * @param $data
     * @return bool
     */
    public function insert($data)
    {
        if (count($this->arr) >= $this->count) return false;
        $this->arr[] = $data;
        ++$this->count;

        //进行堆化
        $i = $this->count;
        while($i / 2 && $this->arr[$i / 2] < $this->arr[$i]) {
            //交换位置
            list($this->arr[$i / 2], $this->arr[$i]) = [$this->arr[$i], $this->arr[$i / 2]];
            $i = $i >> 2;
        }
    }

    /**
     * 删除堆顶元素
     * 思路1： 首先删除堆顶，然后在从子元素中找到次大元素放入堆顶，直到叶子节点；这种会导致堆变为非完全二叉树，
     * 思路2： 将堆顶节点直接替换为末节点， 然后进行之上而下的堆化，这种不会出现非完全二叉树，
    */
    public function deleteTop()
    {
        $this->arr[1] = $this->arr[$this->count];
        array_pop($this->arr);
        --$this->count;
        $maxPos = $i = 1;
        while (true) {
            $maxPos = $i;
            if ($i * 2 < $this->count && $this->arr[$i] < $this->arr[$i * 2]) $maxPos = 2 * $i;
            if ($i * 2 + 1 < $this->count && $this->arr[$maxPos] < $this->arr[$i * 2+ 1]) $maxPos = 2 * $i + 1;
            if ($maxPos == $i) break;
            list($this->arr[$i], $this->arr[$maxPos]) = [$this->arr[$maxPos], $this->arr[$i]];
            $i = $maxPos;
        }
    }


    /**
     * 优先队列
     * 有序的小文件排序，比如100个
     * 小顶堆，先从各自小文件中取出1个字符，放入堆中，然后循环取出放入堆中，如果使用数组则每个元素都要对比一遍，使用堆删除和查找的时间复炸度为log(n)
    */
}