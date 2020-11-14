<?php


namespace design\structure\decorator;


class Demo
{

    /**
     * 装饰器模式
     * 用于对对象的增强
     * 和原始类继承于同一父类，方便多装饰器处理
     * 和原始类属于组合类型
     */
    public function readFile()
    {
        $path = '/usr/tmp/1.txt';
        $fileStream = new FileInputStream($path);
        $data = new DataInputStream($fileStream);
        $data->read();
    }
}