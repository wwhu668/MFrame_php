<?php
/**
 *入口文件
 *定义常量
 *加载函数库
 *启动框架
 */

define('IMOOC', realpath('./'));
define('CORE', IMOOC.'/Core');
define('APP', IMOOC.'/App');
define('CONFIG_DIR', IMOOC.'core/config');
define('DEBUG', true);

// 自动载入
spl_autoload_extensions('.php');
set_include_path(get_include_path() . 'PATH_SEPARATOR'. IMOOC);
spl_autoload_register();

if (DEBUG) {
    ini_set('display_errors', "On");
} else {
    ini_set('display_errors', 'Off');
}

include CORE . '/common/function.php';
// include CORE . '/imooc.php';
try {
    Core\Main::run();
    Core\Lib\Conf::get('route');
} catch (Exception $e) {
    P($e->getMessage());
}
