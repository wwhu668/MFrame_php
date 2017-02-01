<?php

namespace Core\Lib;

use Medoo;
use Core\Lib\Conf;

class Model extends Medoo
{
    public function __construct()
    {
        $option = Conf::get('databases');
        parent::__construct($option);
    }
}
