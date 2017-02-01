<?php
namespace Core\Lib\Dirve\Log;

use Core\Lib\Conf;

class File
{
    private $path;
    public function __construct()
    {
        $conf =  Conf::get('log', 'OPTION');
        $this->path = $conf['PATH'];
    }

    public function log($message, $file = 'log')
    {
        $path = $this->path . date('YmdH') . '/';
        if(!is_dir($path)) {
            mkdir($path, '0777', true);
        }
        return file_put_contents(
            $path . $file . '.php',
            date('Y-m-d H:i:s') . json_encode($message) . PHP_EOL,
            FILE_APPEND
        );
    }
}
