<?php


namespace design\structure\strategy;


class ARange
{
    private int $start;
    private int $end;
    private string $sortAlg;

    public function __construct(int $start, int $end, string $sortAlg)
    {
        $this->start = $start;

        $this->end = $end;
        $this->sortAlg = $sortAlg;
    }

    public function inRange($fileSize)
    {
        return $fileSize >= $this->start && $fileSize < $this->end;
    }

    public function getSort()
    {
        return SortFactory::getSort($this->sortAlg);
    }
}