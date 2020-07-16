<?php

/**
 * 广度优先暴力破解
 * @param $grid
 * @return int
 */
function bfs($grid)
{
    if (count($grid) == 0 || count($grid[0]) == 0) return 0;

    $nr = count($grid);
    $nc = count($grid[0]);
    $count = 0;
    $queue = [];
    //$range = [[-1, 0], [1, 0], [0, -1], [0, 1]];

    for ($i = 0; $i < $nr; $i++) {
        for ($j = 0; $j < $nc; $j++) {
            //如果当前节点是岛屿，将其放入队列中，考察他的前后左右节点，并将节点归0
            if ($grid[$i][$j] == '1') {
                $grid[$i][$j] = 0;
                ++$count;
                $queue[] = $nc * $i + $j;
                while (!empty($queue)) {
                    $rc = array_shift($queue);
                    $col = $rc % $nc;
                    $row = $rc / $nc;
                    //然后一次考察节点的前后左右
                    if ($row - 1 >= 0 && $grid[$row - 1][$col] == '1') {
                        $queue[] = ($row - 1) * $nc + $col;
                        $grid[$row - 1][$col] = 0;
                    }
                    if ($row + 1 <= $nr && $grid[$row + 1][$col] == '1') {
                        $queue[] = ($row + 1) * $nc + $col;
                        $grid[$row + 1][$col] = 0;
                    }
                    if ($col - 1 >= 0 && $grid[$row][$col - 1] == '1') {
                        $queue[] = $row * $nc + ($col - 1);
                        $grid[$row][$col - 1] = 0;
                    }
                    if ($col + 1 <= $nc && $grid[$row][$col + 1] == '1') {
                        $queue[] = $row * $nc + $col + 1;
                        $grid[$row][$col + 1] = 0;
                    }
                }
            }
        }
    }
    return $count;
}

$grid = [["1","1","1","1","0"],["1","1","0","1","0"],["1","1","0","0","0"],["0","0","0","0","0"]];

echo bfs($grid);