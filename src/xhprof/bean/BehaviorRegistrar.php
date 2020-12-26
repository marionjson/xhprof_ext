<?php

namespace xhprof\bean;

use xhprof\filter\Filter;
use xhprof\Interceptor\InitInterceptor;
use xhprof\util\ShutdownScheduler;

/***
 * 行为注册器
 * Class BaseInstance
 * @package xhprof\enmus\bean
 */
class BehaviorRegistrar extends BaseInstance
{
    use ShutdownScheduler;

    /***
     * 行为注入
     */
    const BEHAVIOR_INJECTION = [];

    /***
     * 后置行为
     */
    const AFTER_BEHAVIOR = "after";

    /***
     * 前置行为
     */
    const BEFORE_BEHAVIOR = "before";


    /***
     * 注册行为
     * @param string $behavior
     * @return bool
     */
    public static function run($behavior)
    {
        /***
         * @var Filter $class
         */
        foreach (static::getBehaviorInjectionByBehavior($behavior) as $class) {
            echo (string)$class . ":" . $behavior . "\n";
            if (!$class::getInstance()->$behavior()) {
                return false;
            }
        }
        return true;
    }

    /***
     * 获取行为列表
     * @param $behavior
     * @return array
     */
    public static function getBehaviorInjectionByBehavior($behavior)
    {
        return $behavior == static::AFTER_BEHAVIOR ? array_reverse(static::BEHAVIOR_INJECTION) : static::BEHAVIOR_INJECTION;
    }


    /***
     * 运行拦截器
     * @param string $behavior
     * @return bool|InitInterceptor
     */
    public function register()
    {
        return static::run(static::BEFORE_BEHAVIOR) &&
            static::registerShutdownEvent(
                [
                    static::getInstance(),
                    'run'
                ],
                static::AFTER_BEHAVIOR
            );
    }
}