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
 * 快速排序，使用递归思想，
 * 选取一个初始值，其余值跟这个比较，分成左右两组
 * 时间复杂度 O(nlogn)
*/
function qucksort($arr)
{
    $count = count($arr);
    if ($count < 2) {
        return $arr;
    }
    $mid = $arr[0];
    $left = $right = [];
    for ($i = 1; $i < $count; $i++) {
        if ($arr[$i] < $mid) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }
    $left = qucksort($left);
    $right = qucksort($right);
    return array_merge($left,[$mid],$right);

}

$a = [2, 1, 34, 3, 2, 7, 6, 8, 5, 10];


print_r(qucksort($a));
