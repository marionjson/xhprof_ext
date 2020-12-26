<?php
/***
 * 配置读取工具
 * Class ConfigUtil
 * @package xhprof\util
 */

namespace xhprof\util;

class ConfigUtil
{
    /***
     * 公共配置
     * @var
     */
    protected static $config = [];

    /***
     * 文件配置
     * @var
     */
    protected static $fileConfig = [];


    /**
     * 自动加载配置
     * @param $file
     */
    public static function load($file)
    {
        if (empty(self::$fileConfig[$file])) {
            self::$fileConfig[$file] = include($file);
        }
        self::$config = array_merge(self::$config, self::$fileConfig[$file]);
    }

    /**
     * 读取配置
     * @param string $name 配置KEY
     * @return string|array|null
     */
    public static function read($name)
    {
        if (isset(self::$config[$name])) {
            return self::$config[$name];
        }
        return null;
    }


    /**
     * 写入指定配置
     * @param string $name 配置KEY
     * @param string|array $value 值
     */
    public static function write($name, $value)
    {
        self::$config[$name] = $value;
    }

    /**
     * 清除所有配置
     * @return void
     */
    public static function clear()
    {
        self::$config = [];
    }

    /***
     * 注入配置文件
     */
    public static function injectionConfig()
    {
        if ($head = opendir(XHPROF_CONFIG)) {
            while (($file = readdir($head)) !== false) {
                if ($file != ".." && $file != ".") {
                    if (pathinfo($file, PATHINFO_EXTENSION) == "php") {
                        ConfigUtil::load(XHPROF_CONFIG . $file);
                    }
                }
            }
        }
        closedir($head);
    }


}
