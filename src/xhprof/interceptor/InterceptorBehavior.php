<?php

namespace xhprof\Interceptor;

use xhprof\bean\BehaviorRegistrar;
use xhprof\Interceptor\impl\XhprofInterceptor;

/****
 * Class InitInterceptor
 * @package xhprof\Interceptor
 */
class InterceptorBehavior extends BehaviorRegistrar
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