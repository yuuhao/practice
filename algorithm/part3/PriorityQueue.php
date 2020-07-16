<?php


namespace practice\algorithm;


class PriorityQueue //据vertex.dist构建小顶堆
{
    const MAX = 9999;
    private $nodes;

    private $count;

    public function __construct($v)
    {
        $this->count = $v;
    }

    public function poll() {}

    public function add() {}

    public function update() {}

    public function isEmpty() {}

    public function dijkstra(int $s, int $t) //从顶点s到顶点t的最短路径
    {
        $predecessor = []; // 用来还原最短路径
        $vertexes = [];

        for ($i = 0; $i < $this->count; $i++) {
            $vertexes[$i] = new Vertex($i, self::MAX);
        }
        
    }
}