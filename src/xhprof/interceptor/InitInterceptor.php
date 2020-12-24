<?php

namespace xhprof\Interceptor;

use xhprof\bean\BaseInstance;
use xhprof\Interceptor\impl\XhprofInterceptor;
use xhprof\run\Boostrap;
use xhprof\util\ShutdownScheduler;

/****
 * Class InitInterceptor
 * @package xhprof\Interceptor
 */
class InitInterceptor extends ShutdownScheduler
{

    /***
     * 过滤注册器
     */
    const INTERCEPTOR_BEHAVIOR_INJECTION = [
        /***
         * @var XhprofInterceptor 网关验证器
         */
        "xhprof\\Interceptor\\impl\\XhprofInterceptor",
    ];

    /***
     * 注册拦截器
     * @param string $behavior
     * @return bool|InitInterceptor
     */
    public function register()
    {
        return self::run("beforeInterceptor") &&
            self::registerShutdownEvent(
                [
                    self::getInstance(),
                    'run'
                ],
                "afterInterceptor"
            );
    }

    /***
     * 运行拦截器
     * @param string $behavior
     * @return bool|InitInterceptor
     */
    public static function run($behavior)
    {
        /***
         * @var Interceptor $class
         */
        foreach (self::INTERCEPTOR_BEHAVIOR_INJECTION as $class) {
            if (!$class::getInstance()->$behavior()) {
                return false;
            }
        }
        return true;
    }


}