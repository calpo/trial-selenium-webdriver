<?php
class SMap
{
    public static $confList = [];

    public static function connect($path, $opt)
    {
        static::$confList[] = [
            'path'       => $path,
            'controller' => $opt['controller'],
            'action'     => $opt['action'],
        ];
    }

    public static function toTsv()
    {
        foreach (static::$confList as $conf) {
            echo $conf['path'];
            echo "\t";
            echo $conf['controller'];
            echo "\t";
            echo $conf['action'];
            echo "\n";
        }
    }
}
