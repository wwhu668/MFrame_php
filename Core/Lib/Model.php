<?php

namespace Core\Lib;

use PDO;
use Core\Lib\Conf;

class Model extends PDO
{
    public function __construct()
    {
        $database = Conf::get('databases');
        try {
            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
        } catch (\Exception $e) {
            P($e->getMessage());
        }

    }
}
