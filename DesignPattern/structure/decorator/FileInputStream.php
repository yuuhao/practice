<?php


namespace design\structure\decorator;


class FileInputStream extends InputStream
{

    public string $filePath;
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function read()
    {
        $string = file_get_contents($this->filePath);
    }

    public function getFile()
    {
        return strlen($this->filePath);
    }
}