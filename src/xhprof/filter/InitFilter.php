<?php

namespace xhprof\filter;


use xhprof\bean\BehaviorRegistrar;
use xhprof\filter\impl\GatewayFilter;
use xhprof\filter\impl\LimitFilter;
use xhprof\Interceptor\InitInterceptor;

/****
 * Class InitFilter
 * @package xhprof\filter
 */
class InitFilter extends BehaviorRegistrar
{
    /***
     * 过滤注册器
     */
    const BEHAVIOR_INJECTION = [
        /***
         * @var GatewayFilter 网关过滤器
         */
        "xhprof\\filter\\impl\\GatewayFilter",

        /***
         * @var LimitFilter 限流过滤器
         */
        "xhprof\\filter\\impl\\LimitFilter",
    ];

}