<?php
/**
 * Created by PhpStorm.
 * User: yuhao
 * Date: 2019/5/17
 * Time: 22:21
 */

/**
 * 栈 stack 是一种先进后出的数据结构
 * 多用来检验() [] <> 等标签是否合法
 */


function stack()
{
    $stack = [];
    $peek = [
        ')' => '(',
        ']' => '['
    ];
    $str = "[(()])";
   // print_r($peek);die;
    $strlen = mb_strlen($str);
    for ($i = 0; $i < $strlen; $i++) {
        if (in_array($str[$i], $peek)) {
            // 如果时左括号，先压入栈中
            $stack[] = $str[$i];
        }else {
            //如果是右括号，则推出一个栈值
            $item = array_pop($stack);
            if( !isset($peek[$str[$i]]) || $peek[$str[$i]] != $item) {
                return '不合法';
            }
        }
    }
    if(count($stack)) {
        return '不合法';
    }
}

echo stack();
