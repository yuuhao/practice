<?php


namespace practice\algorithm;

use practice\data\Graph;

/**
 * 深度优先搜索， 只找到路径但不是最佳路径
*/
class DFS
{

    private $graph;

    private $found; //当找到结点后便不再遍历

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }


    public function dfs(int $s, int $t)
    {
        if ($s == $t) return;
        $visited = [];
        $prev = [];
        $this->found = false;
        array_fill(0, $this->graph->len, -1);
        $this->recurDfs($s, $t, $visited, $prev);
        $this->print($prev, $s, $t);
    }

    public function recurDfs($w, $t, &$visited, &$prev)
    {
        if ($this->found) {
            return;
        }
        $visited[$w] = true;
        if ($w == $t) {
            $this->found = true;
            return;
        }
        for ($i = 0; $i < count($this->graph->arr[$w]); $i++) {
            $q = $this->graph->arr[$w][$i];
            if (!$visited[$q]) {
                $prev[$q] = $w;
                $this->recurDfs($q, $t, $visited, $prev);
            }
        }
    }

    public function print(array $prev, int $s, int $t)
    {
        //打印路径
        if ($prev[$t] != -1 && $t != $s) {
            $this->print($prev, $s, $prev[$t]);
        }
        print($t . ' ');
    }
}