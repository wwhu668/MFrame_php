<?php

namespace Core\Lib;

class Log
{
    public static $logObj;

    public static function init()
    {
        $drive = conf::get('log', 'DRIVE');
        $logSpace = '\\Core\\Lib\\Dirve\\Log\\'. $drive;
        self::$logObj = new $logSpace();
    }

    public static function log($name, $file = 'log')
    {
        self::$logObj->log($name, $file);
    }
}
