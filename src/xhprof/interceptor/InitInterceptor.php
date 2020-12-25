<?php

namespace xhprof\Interceptor;

use xhprof\bean\BaseInstance;
use xhprof\bean\BehaviorRegistrar;
use xhprof\Interceptor\impl\XhprofInterceptor;
use xhprof\run\Bootstrap;
use xhprof\util\ShutdownScheduler;

/****
 * Class InitInterceptor
 * @package xhprof\Interceptor
 */
class InitInterceptor extends BehaviorRegistrar
{

    /***
     * 过滤注册器
     */
    const BEHAVIOR_INJECTION = [
        /***
         * @var XhprofInterceptor 网关验证器
         */
        "xhprof\\Interceptor\\impl\\XhprofInterceptor",
    ];


}