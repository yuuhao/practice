<?php
/**
 * Created by PhpStorm.
 * User: yuhao
 * Date: 2019/5/30
 * Time: 22:26
 */
/**
 * 归并排序使用分而治之的思想，分是将大问题解决为小问题，治是将小问题的解决修整为大问题的解决
 * 分而治之一般使用递归实现
 * 归并排序在实现上就是将数组一分为二，然后继续往下拆分
 *
 */
function mergeSort($arrr)
{
    $size = count($arrr);
    if ($size == 1) {
        return $arrr;
    }
    $half = $size >> 1;
    $arr = array_slice($arrr, 0, $half);
    $brr = array_slice($arrr, $half);
    $x = mergeSort($arr);
    $y = mergeSort($brr);
    return mergeArray($x, $y);
}


function mergeArray($x, $y)
{
    if (empty($x) && empty($y)) {
        return false;
    }

    if (empty($x)) {
        return $y;
    }
    if (empty($y)) {
        return $x;
    }
    $i = $j = 0;
    while ($i < count($x) &&  $j < count($y)) {
        if ($x[$i] < $y[$j]) {
            $crr[] = $x[$i];
            $i++;
        } else {
            //[1,,7,8,9] [0,2,3,4] -- [7,8,9] []
            $crr[] = $y[$j];
            $j++;
        }
    }

    if (isset($x[$i])) {
        $crr = array_merge($crr, array_slice($x, $i));
    }
    if (isset($y[$j])) {
        $crr = array_merge($crr, array_slice($y, $j));
    }
    return $crr;
}


$a = [2, 1, 34, 3, 2, 7, 6, 8, 5, 10];
print_r(mergeSort($a));