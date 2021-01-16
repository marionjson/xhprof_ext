<?php


namespace xhprof\run;


use xhprof\filter\FilterBehavior;
use xhprof\illuminate\BehaviorIterator;
use xhprof\illuminate\ShutdownScheduler;
use xhprof\Interceptor\InterceptorBehavior;

/***
 * 引导程序
 * Class Bootstrap
 * @package xhprof\run
 */
class Bootstrap extends ShutdownScheduler
{
    use BehaviorIterator;

    /***
     * 容器注入
     * @var string[]
     */
    const  BEHAVIOR_INJECTION = [
        /***
         * @var FilterBehavior
         */
        "xhprof\\filter\\FilterBehavior",
        /***
         * @var InterceptorBehavior
         */
         "xhprof\\Interceptor\\InterceptorBehavior"
    ];

    /***
     * 获取行为注册表
     * @param $behavior
     * @return array
     */
    public function getBehaviorInjectionByBehavior($behavior)
    {
        // TODO: Implement getBehaviorInjectionByBehavior() method.
        return static::BEHAVIOR_INJECTION;
    }
}

