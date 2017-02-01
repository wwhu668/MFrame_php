<?php

namespace App\Controllers;

use Core\Lib\Model;
use Core\Main;

class IndexController extends Main
{
    function index()
    {
        // $route = \core\lib\Conf::get('route');
        new Model();
        $data = 'Hello World';
        $this->assign('data', $data);
        $this->display('index.html');
    }
}
