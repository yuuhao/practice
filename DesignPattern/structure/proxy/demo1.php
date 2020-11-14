<?php
namespace demo;

class Mysql
{

    function connect($db){
        echo "connecting database ${db[0]}\r\n";
    }

}

class SqlProxy
{

    private object $sqlProxy;

    function __construct($tar){

        $this->sqlProxy = $tar;

    }

    function __call($name, $args){

        $r = new \ReflectionClass($this->sqlProxy);
        if($method = $r->getMethod($name)){

            if($method->isPublic() && !$method->isAbstract()){

                echo "method before record \r\n";

                $method->invoke($this->sqlProxy,$args);

                echo "method after record\r\n";

            }

        }

    }

}

$obj = new SqlProxy('Mysql');

$obj->connect('member');