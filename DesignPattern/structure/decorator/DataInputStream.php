<?php


namespace design\structure\decorator;


class DataInputStream extends InputStream
{
    protected InputStream $in;

    public function __construct(InputStream $in)
    {
        $this->in = $in;
    }
    public function read()
    {
        // 增强
        $this->in->read();
        // 123
    }

    public function getFile()
    {
        // TODO: Implement getFile() method.
    }
}