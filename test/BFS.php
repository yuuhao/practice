<?php

namespace practice\test;


use practice\data\Graph;

class BFS
{
    /**
     * 广度优先搜索
     *
    */
    private $graph;

    public function __construct(Graph $graph)
    {
        /**
         * 图，存储数据结构为邻接表方式
         * PHP可以使用二维关联数组存储
         */
        $this->graph  = $graph;
    }


    /**
     * 求顶点s到顶点t的路径
     * @param int $s
     * @param int $t
     */
    public function bfs(int $s, int $t)
    {
        $visited = [];//记录被访问过的顶点
        $dist = [];//记录某个节点的前驱顶点
        $visited[$s] = true;
        $queue = [$s]; //存放已遍历，但是出度节点未遍历的顶点
        while (!empty($queue)) {
            $q = array_shift($queue);
            for ($i = 0; $i < count($this->graph[$q]); $i++) {
                //如果q的某个入度被访问了
                if (!$visited[$this->graph[$q][$i]]) {
                    $visited[$this->graph[$q][$i]] = true;
                    if ($this->graph[$q][$i] == $t) {
                        print_r($dist);
                        return;
                    }
                    $dist[$this->graph[$q][$i]] = $q;
                    $queue[] = $this->graph[$q][$i];
                }
            }
        }
        print_r($dist);
    }
}