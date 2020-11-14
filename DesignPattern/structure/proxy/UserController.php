<?php


namespace design\structure\proxy;


class UserController implements IUserController
{
    public function login(String $mobile, string $passwd)
    {
        // login登录逻辑步骤
            // ... 验证手机号
            // ... 验证密码登录
            // 查找数据库
            // 判断用户是否合法
    }
    //php 如何实现动态代理
}