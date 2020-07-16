<?php


namespace practice\algorithm;


use practice\data\Graph;

class BFS
{
    private $graph;

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    public function bfs(int $s, int $t)
    {
        if ($s == $t) return;
        /*用来记录已经被访问的顶点，避免重复访问*/
        $visited = [];
        $visited[$s] = true;

        /*用来存储已经被访问，但是相连的定点还未被访问，*/
        $queue = [];
        $queue[] = $s;

        /*用来记录搜索路径，反向记录，prev[w] 表示顶点w是从哪个前驱顶点遍历过来*/
        $prev = [];
        array_fill(0, $this->graph->len,-1);

        while($queue) {
            $w = array_shift($queue);
            for ($i = 0; $i < count($this->graph->arr[$w]);  $i++) {
                $q = $this->graph->arr[$w][$i];
                if  (!$visited[$q]) {
                    $prev[$q] = $w;//只放入第一次的来源，就是最近
                    if ($q == $t) {
                        $this->print($prev, $s, $t);
                        return;
                    }
                    $queue[] = $q;
                    $visited[$q] = true;
                }
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