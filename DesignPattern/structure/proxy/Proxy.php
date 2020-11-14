<?php

namespace design\structure\proxy;

/**
 * 代理模式：在不改变原始类代码的情况下，通过引入代理类来给原始类附加功能
 * 业务代码和框架代码的分离
*/
class Proxy
{

    public function userLogin()
    {
        call_user_func();
    }
}