<?php

namespace xhprof\bean;

use xhprof\filter\Filter;
use xhprof\illuminate\Container;
use xhprof\illuminate\ShutdownScheduler;

/***
 * 行为注册器
 * Class BaseInstance
 * @package xhprof\enmus\bean
 */
class BehaviorRegistrar extends Container
{

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
    public function run($behavior)
    {
        /***
         * @var Filter $class
         */
        foreach ($this->getBehaviorInjectionByBehavior($behavior) as $class) {
            $this->bind($class);
            echo (string)$class . ":" . $behavior . "\n";
            if (!$this->make($class)->$behavior()) {
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
    public function getBehaviorInjectionByBehavior($behavior)
    {
        return $behavior == static::AFTER_BEHAVIOR ? array_reverse(static::BEHAVIOR_INJECTION) : static::BEHAVIOR_INJECTION;
    }


    /***
     * 运行拦截器
     * @param string $behavior
     * @return bool
     */
    public function register()
    {
        return $this->run(static::BEFORE_BEHAVIOR) &&
            $this->registerShutdownEvent(
                [
                    $this,
                    'run'
                ],
                static::AFTER_BEHAVIOR
            );
    }
}