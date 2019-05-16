<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 23:17
 */
//hongbao

function make()
{
    $n = 10;
    $sum = 100;
    $result = [];
    while ($n > 1) {
        $random = mt_rand(600, 1200) / 100;
        //6n <= sum<=12n; n wei 剩余人数，sum为剩余钱数
        if (($sum - $random >= ($n - 1) * 6) && ($sum - $random <= ($n - 1) * 12)) {
            $result[] = $random;
            $sum -= $random;
            $n--;
        }
    }

    return $result;
}

function makeSeq2()
{
    $n = 10;
    $sum = 100;
    $result = [];
    for ($i = $n; $i >= 1; $i--) {
        $min = ($sum - 12 * ($i - 1)) > 6 ? ($sum - 12 * ($i - 1)) : 6;
        $max = ($sum - 6 * ($i - 1)) < 12 ? ($sum - 6 * ($i - 1)) : 12;
        $randNum = mt_rand($min, $max);
        $sum -= $randNum;
        $result[] = $randNum;
    }
    return $result;
}

print_r(make());


