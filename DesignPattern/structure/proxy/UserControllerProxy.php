<?php


namespace design\structure\proxy;


class UserControllerProxy implements IUserController
{

    public  UserController $userController;

    public function __construct()
    {
        $this->userController = new UserController();
    }

    public function login(string $mobile, string $passwd)
    {
        $timestamp = time();

        $this->userController->login( $mobile,  $passwd);

        $this->recordResponseTime($timestamp, __CLASS__ . '/' . __FUNCTION__);
        $this->recordResponseCount(__CLASS__ . '/' . __FUNCTION__);
        return 0;
    }


    /**
     * 统计接口响应时间
     * @param $start
     * @param $action
     */
    public function recordResponseTime($start, $action)
    {
        $diff = microtime() - $start;
        file_put_contents('', $diff . $action);
    }

    /**
     * 接口请求次数
     * @param $action
     */
    public function recordResponseCount($action)
    {
        $arr = json_decode(file_get_contents('', ''));
        $action[$action]++;
        file_put_contents('', $action);
    }
}