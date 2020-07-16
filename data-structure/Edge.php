<?php


namespace practice\data;


class Edge
{
    public $sid; //边的起始顶点编号
    public $tid; //边的终止顶点编号
    public $w; //权重

    public function __construct($s, $t, $w)
    {
        $this->sid = $s;
        $this->tid = $t;
        $this->w = $w;
    }
}