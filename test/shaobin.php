<?php
// 哨兵，一般用来界定边界问题，　可以减少执行判断的次数


/** 在数组ａ中寻找ｋｅｙ
 * 无哨兵查询
 * @param array $a
 * @param $key
 * @return int
 */
function find(array $a, $key)
{
    if ($a == null || count($a) < 1) {
        return -1;
    }
    // test
    $count = count($a);

    $i = 0;

    //　需要执行２步
    while ($i < $count) {
          if ($a[$i] == $key) {
              return $i;
          }
          $i++;
    }
    return -1;
}


/**
 * @param array $a // [1,3,2,4,6,7]
 * @param $key 4
 * @return int
 */
function find1(array $a, $key)
{
    if ($a == null || count($a) < 1) {
        return -1;
    }
    // 顺序向后查询
    //　先判断最后一位是否是key ,如果不是的话，将最后一位设为ｋｅｙ，（此时如果查找ｋｅｙ，肯定能找到）　然后　向后查询，如果找到可以

    $count = count($a);
    if ($a[$count - 1] == $key) {
        return $count - 1;
    }
    $tmp = $a[$count - 1]; //　先将最后一位保持起来
    $a[$count - 1] = $key; // 将ｋｅｙ赋值给最后一位，这样在判断ａ[i] 是否等于ｋｅｙ的时候，　就不用判断索引是否超出数组ａ
    $i = 0;
    while ($a[$i] != $key) {
        $i++;
    }

    //　循环完毕后，判断$i　的值
    if ($i == ($count - 1)) {
        return -1;
    }
    return $i;
}
