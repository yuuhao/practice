<?php

namespace demo;

class User
{
    public function login()
    {
        echo "login";
    }
}

class DynamicProxy
{
    public object $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * 魔术方法
     * 当调用不存在的类方法时执行
     * @param $name
     * @param $args
     */
    public function __call($name, $args)
    {
        $r = new \ReflectionClass($this->user);
        if ($method = $r->getMethod($name)) {
            $method->invoke();
        }
    }
}

$user = new DynamicProxy(new User());

$user->login(12, 34);