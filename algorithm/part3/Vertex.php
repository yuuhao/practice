<?php


namespace practice\algorithm;


class Vertex
{
    public $id; //顶点编号
    public $dist;//从起始顶点到这个顶点距离

    public function  __construct(int $id, int $dist)
    {
        $this->id = $id;
        $this->dist = $dist;
    }
}