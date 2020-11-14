<?php


namespace design\structure\strategy;


class Sorter
{

    public array $sortList;

    public function __construct()
    {
        $this->sortList = [
            new ARange(0, 6 * 1024, 'quick'),
            new ARange(6 * 1024, 10 * 1024, 'external'),
            new ARange(10 * 1024, 100 * 1024, 'currentExternal'),
            new ARange(100 * 1024, 1000 * 1024, 'mapReduce'),
        ];
    }

    public function sort($file)
    {
        // 不好看
        if ($file['size'] < 6 * 1024) {
            QuickSort::class;
        } elseif ($file['size'] < 10 * 1024) {
            ExternalSort::class;
        } elseif ($file['size'] < 100 * 1024) {
            ConcurrentExternalSort::class;
        } else {
            MapReduceSort::class;
        }
    }

    public function sort1($file) {

        $sorter  = null;
        foreach ($this->sortList as $sortRange) {
            if ($sortRange->inRange($file['size'])) {
                $sorter = $sortRange->getSort();
                break;
            }
        }
        return $sorter->sort($file);
    }
}