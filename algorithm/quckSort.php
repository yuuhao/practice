<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 23:17
 */
//$a=[1,2,3];
//print_r(str_split(str_repeat(implode('',$a),3),1));
//快排，
//abc
/**
 * 快速排序
 * 时间复杂度 O(nlogn)
*/

function test($a)
{
    $count = count($a);
    if ($count < 2) {
        return $a;
    }
    $base_item = $a[0];
    $base = $left = $right = [];
    for ($i = 0; $i < $count; $i++) {

        if ($a[$i] < $base_item) {
            $left[] = $a[$i];
        } else if ($a[$i] > $base_item) {
            $right[] = $a[$i];
        } else {
            $base[] = $a[$i];
        }

    }
    $left = test($left);
    $right = test($right);
    return array_merge($left, $base, $right);

}

$a = [2, 1, 34, 3, 2, 7, 6, 8, 5, 10];



