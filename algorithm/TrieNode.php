<?php


namespace practice\algorithm;


class TrieNode
{
    public $data;

    public $children;// count() = 26

    public $isEndingNode = false;

    public function __construct($data)
    {
        $this->data = $data;
    }
}