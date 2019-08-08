<?php
/**
 * Created by PhpStorm.
 * User: yuhao
 * Date: 2019/7/8 最亮的靓仔, 魏无羡
 * Time: 23:13
 */

/**
 * 循环二分查找
 */
function binQuery1(array $arr, $q)
{
    $count = count($arr);
    $low = 0;
    $high = $count - 1;
    $mid = ($low + $high) >> 1;

    while ($low <= $high) {
        $mid = ($low + $high) >> 1;
        if ($arr[$mid] == $q) {
            return $mid;
        } elseif ($q < $arr[$mid]) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }
    return -1;
}

/**
 * 递归二分查找
 */

function binQuery2($arr, $q)
{
    $count = count($arr);
    $low = 0;
    $high = $count - 1;
    return query($arr, $low, $high, $q);
}

function query($arr, $low, $high, $q)
{
    if ($low > $high) {
        return -1;
    }
    $mid = ($low + $high) >> 1;
    if ($arr[$mid] == $q) {
        return $mid;
    } elseif ($q < $arr[$mid]) {
       return query($arr, $low, $mid - 1, $q);
    } else {
       return query($arr, $mid + 1, $high, $q);
    }
}

$a = [1, 2, 3, 4, 5, 6, 7, 8];

echo binQuery2($a, 80);

