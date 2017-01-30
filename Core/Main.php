<?php

namespace Core;
use Core\lib\Route;

class Main
{
    public $assign;
    public static function run()
    {
        $route = new Route();
        $controller = $route->controller;
        $action = $route->action;
        $controllerPath = 'APP\\Controllers\\' . $controller . 'Controller';
        $ControllerObj = new $controllerPath();
        $ControllerObj->$action();
    }

    public static function load()
    {

    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file = APP . '/views/' . $file;
        if(is_file($file)) {
            extract($this->assign);
            include($file);
        }
    }
}
