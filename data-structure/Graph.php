<?php

namespace practice\data;

class Graph //无向图
{
    public $len;//顶点的个数

    public $arr; //邻接表

    public function __construct($len)
    {
        $this->len = $len;
        for ($i = 0; $i < $this->len; $i++) {
            $this->arr[$i] = [];
        }
    }

    public function addEdge($s, $t, $w) // 无向图一条边存两次
    {
        array_push($this->arr[$s], new Edge($s, $t, $w));
    }
}