<?php


namespace practice\test;


class SingleNode
{
    public SingleNode $next;

    public string $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }
}