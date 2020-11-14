<?php


namespace design\structure\strategy;


class SortFactory
{

    private static array $sortList = [
        'quick' => QuickSort::class,
        'external' => ExternalSort::class,
        'currentExternal' => ConcurrentExternalSort::class,
        'mapReduce' => MapReduceSort::class,
    ];

    public static function getSort(string $type)
    {
        return new self::$sortList[$type];
    }
}