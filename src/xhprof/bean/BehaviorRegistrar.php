<?php

namespace xhprof\bean;

use xhprof\illuminate\BehaviorIterator;
use xhprof\illuminate\ShutdownScheduler;

/***
 * 行为注册器
 * Class BaseInstance
 * @package xhprof\enmus\bean
 */
class BehaviorRegistrar extends ShutdownScheduler
{
    use BehaviorIterator;

    /***
     * 后置行为
     */
    const AFTER_BEHAVIOR = "after";

    /***
     * 前置行为
     */
    const BEFORE_BEHAVIOR= "before";


    /***
     * 获取行为注册表
     * @param $behavior
     * @return array
     */
    public function getBehaviorInjectionByBehavior($behavior)
    {
        return $behavior == static::AFTER_BEHAVIOR ?
            array_reverse(static::BEHAVIOR_INJECTION) :
            static::BEHAVIOR_INJECTION;
    }


    /***
     * 运行拦截器
     * @return bool
     */
    public function run()
    {
        return $this->register(self::BEFORE_BEHAVIOR) &&
            $this->registerShutdownEvent(
                [
                    $this,
                    'run'
                ],
                self::AFTER_BEHAVIOR
            );
    }

}