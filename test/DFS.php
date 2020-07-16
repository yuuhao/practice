<?php


namespace practice\test;


use practice\data\Graph;

class DFS
{
    /**
     * 深度优先搜索，
     * 一条路走到黑，如果不通，后退一步换条路走
    */

    private $graph; //图

    private $found;// 是否找到路

    private $visited = [];

    private $dist = [];

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    function dfs(int $s, int $t)
    {
        $this->found = false;
        $this->recurDfs($s, $t);

    }

    public function recurDfs(int $w, int $t)
    {
        if ($this->found == true) {
            return true;
        }
        if ($w == $t) {
            return true;
        }
        $q = array_shift($queue);
        for ($i = 0; $i < count($this->graph[$q]); $i++) {
            $w = $this->graph[$q][$i];
            if (!$this->visited[$w]) {
                $this->visited[$w] = true;
                $this->dist[$w] = $q;
                $this->recurDfs($w, $t);
            }
        }
    }
}