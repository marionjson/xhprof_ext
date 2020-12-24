<?php

namespace xhprof\filter;


use xhprof\bean\BaseInstance;
use xhprof\filter\impl\GatewayFilter;
use xhprof\Interceptor\InitInterceptor;
use xhprof\util\ShutdownScheduler;

/****
 * Class InitFilter
 * @package xhprof\filter
 */
class InitFilter extends ShutdownScheduler
{


    /***
     * 过滤注册器
     */
    const FILTER_BEHAVIOR_INJECTION = [
        /***
         * @var GatewayFilter 网关验证器
         */
        "xhprof\\filter\\impl\\GatewayFilter",
    ];

    /***
     * 运行拦截器
     * @param string $behavior
     * @return bool|InitInterceptor
     */
    public function register()
    {
        return self::run("beforeFilter") &&
            self::registerShutdownEvent(
                [
                    self::getInstance(),
                    'run'
                ],
                "afterFilter"
            );
    }

    /***
     * 注册过滤器
     * @param string $behavior
     * @return bool
     */
    public static function run($behavior)
    {
        /***
         * @var Filter $class
         */
        foreach (self::FILTER_BEHAVIOR_INJECTION as $class) {
            if (!$class::getInstance()->$behavior()) {
                return false;
            }
        }
        return true;
    }


}