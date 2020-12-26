<?php

namespace xhprof\util;


use xhprof\bean\BaseInstance;

/***
 * 事件调度器
 * Class ShutdownScheduler
 * @package xhprof\util
 */
class  ShutdownScheduler extends BaseInstance
{
    /**
     * 默认是否开启调度器
     * @var bool
     */
    private static $scheduler = false;


    /**
     * 响应事件列表
     * @var array
     */
    private static $callbacks;


    /***
     * 注册事件调度器
     */
    protected function __construct()
    {
        if (!self::$scheduler) {
            register_shutdown_function(array($this, 'callRegisteredShutdown'));
            self::$scheduler = true;
        }
    }


    /****
     * 注册关机事件
     * @return bool
     */
    public static function registerShutdownEvent(): bool
    {
        self::$callbacks[] = func_get_args();
        return true;
    }

    /***
     * 执行响应事件列表
     */
    public function callRegisteredShutdown()
    {
        if (isset(self::$callbacks)) {
            foreach (array_reverse(self::$callbacks) as &$arguments) {
                $callback = array_shift($arguments);
                call_user_func_array($callback, $arguments);
            }
            self::$callbacks = [];
        }
    }

}