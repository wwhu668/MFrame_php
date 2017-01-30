<?php

namespace Core\Lib;

use Core\Lib\Conf;

class Route
{
    public $controller;
    public $action;
    public function __construct()
    {
        // 1.隐藏index.php
        // 2.获取URL 参数部分
        // 3.返回对应控制器和方法
        //获取控制器和方法
        $requestUri = $_SERVER['REQUEST_URI'];
        $params = explode('/', $requestUri);
        $this->controller = !empty($params[1]) ? ucfirst($params[1]) : Conf::get('route', 'CONTROLLER');
        $this->action = isset($params[2]) ? $params[2] : Conf::get('route', 'ACTION');
        //获取参数
        $count = count($params);
        for($i = 3; $i < $count; $i += 2) {
            $_GET[$params[$i]] = isset($params[$i + 1]) ? $params[$i + 1] : '';
        }
    }
}
