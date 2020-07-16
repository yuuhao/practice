<?php


namespace design\structure\proxy;


class IUserController
{

}

class A
{
    public $next;
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
}

class B
{
    public $val;
}


$a = new A(3);
$aa = new A(4);
$a->next = $aa;
$b = $a;
echo $a->data . "\n";
echo $b->data . "\n";
echo $b->next->data . "\n";
echo $a->next->data . "\n";
$b->next = new A(5);
echo $a->next->data . "\n";
$b->next->next = new A(6);
echo $a->next->next->data . "\n";
