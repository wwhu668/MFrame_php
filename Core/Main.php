<?php

namespace Core;
use Core\Lib\Route;
use Core\Lib\Log;

class Main
{
    public $assign;
    public static function run()
    {
        // 日记
        Log::init();
        // url路由的调用
        $route = new Route();
        $controller = $route->controller;
        $action = $route->action;
        $controllerPath = CONTROLLER_SPACE . '\\' . $controller . 'Controller';
        $ControllerObj = new $controllerPath();
        $ControllerObj->$action();
        // Log::log('Controller:'. $controller . '    ' . 'action:' . $action);
    }

    // public static function load()
    // {
    //
    // }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($fname)
    {
        $viewsPath = APP . '/views/';
        if(is_file($viewsPath . $fname)) {
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem($viewsPath);
            $twig = new \Twig_Environment($loader, [
                'cache' => IMOOC . '/log/twig',
                'debug' => DEBUG
            ]);
            $template = $twig->loadTemplate($fname);
            $template->display($this->assign ? $this->assign : []);
        }
    }
}
