<?php

namespace Core\Lib;

use PDO;

class Model extends PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=test';
        $username = 'wwhu';
        $passwd = '123456';
        try {
            parent::__construct($dsn, $username, $passwd);
        } catch (\Exception $e) {
            P($e->getMessage());
        }

    }
}
