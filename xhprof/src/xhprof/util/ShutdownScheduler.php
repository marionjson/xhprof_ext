<?php

namespace xhprof\util;

use xhprof\bean\BaseInstance;

/***
 * 事件调度器
 * Class ShutdownScheduler
 * @package xhprof\util
 */
class ShutdownScheduler extends BaseInstance
{
    /**
     * 默认是否开启调度器
     * @var bool
     */
    private static $scheduler = false;

    /***
     * 注册事件调度器
     */
    public function __construct()
    {
        if (!self::$scheduler) {
            register_shutdown_function(array($this, 'callRegisteredShutdown'));
            self::$scheduler = true;
        }
    }


    /***
     * ShutdownScheduler
     * @return ShutdownScheduler
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     * 响应事件列表
     * @var array
     */
    private static $callbacks;


    /****
     * 注册关机事件
     * @return bool
     */
    public static function registerShutdownEvent()
    {
        self::$callbacks[] = func_get_args();
    }

    /***
     * 执行响应事件列表
     */
    public function callRegisteredShutdown()
    {
        foreach (self::$callbacks as &$arguments) {
            $callback = array_shift($arguments);
            call_user_func_array($callback, $arguments);
        }
        self::$callbacks = [];
    }


}