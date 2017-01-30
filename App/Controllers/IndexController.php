<?php

namespace App\Controllers;

use Core\Lib\Model;
use Core\Main;

class IndexController extends Main
{
    function index()
    {
        $data = 'Hello World';
        $this->assign('data', $data);
        $this->display('index.html');
    }
}
