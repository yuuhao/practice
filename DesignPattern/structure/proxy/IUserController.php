<?php


namespace design\structure\proxy;


interface IUserController
{
    public function login(String $mobile, string $passwd);
}