<?php

namespace Core\Lib;

class Conf
{
    /**
     * 缓存配置文件
     * @var array $configs
     */
    public static $confings = [];

    /**
     * 取得一个配置文件的所有配置或其中一个配置项
     * @param  string $name 配置文件名
     * @param  string $key  配置项名
     * @return mixed        找不到配置时返回false，当$key为空时返回文件所有配置，否则只返回$key这配置项
     */
    public static function get($name , $key = null)
    {
        // 没有缓存过配置的话就导入配置文件
        if(!isset(self::$confings[$name])) {
            $file = CONFIG_DIR . '/' . $name . '.php';
            // 没有找到配置文件就返回false
            if (!is_file($file)) {
                echo 1;
                return false;
            }
            self::$confings[$name] = include $file;
        }

        $confing = self::$confings[$name];
        // 如果$key为null则返回配置文件的所有设置
        if (is_null($key)) {
            return $confing;
        }

        // 返回配置项或false
        return isset($confing[$key]) ? $confing[$key] : false;
    }
}
