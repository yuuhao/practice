<?php


namespace design\structure\decorator;


abstract class InputStream
{

    abstract public function read();

    abstract public function getFile();

    public function len()
    {
        return time();
    }

}