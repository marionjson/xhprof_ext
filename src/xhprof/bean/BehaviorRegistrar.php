<?php

namespace xhprof\bean;

use ArrayIterator;
use xhprof\filter\Filter;
use xhprof\illuminate\BehaviorIterator;
use xhprof\illuminate\BooleanIterator;
use xhprof\illuminate\Container;
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
     * 运行拦截器
     * @param string $behavior
     * @return bool
     */
    public function register()
    {
        return $this->run(self::BEFORE_BEHAVIOR) &&
            $this->registerShutdownEvent(
                [
                    $this,
                    'run'
                ],
                self::AFTER_BEHAVIOR
            );
    }

    /***
     * 获取行为注册表
     * @param $behavior
     * @return array
     */
    public function getBehaviorInjectionByBehavior($behavior)
    {
        return $behavior == static::AFTER_BEHAVIOR ? array_reverse(static::BEHAVIOR_INJECTION) : static::BEHAVIOR_INJECTION;
    }

}