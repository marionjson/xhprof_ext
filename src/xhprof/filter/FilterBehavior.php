<?php

namespace xhprof\filter;


use xhprof\bean\BehaviorRegistrar;
use xhprof\filter\impl\GatewayFilter;
use xhprof\filter\impl\LimitFilter;

/****
 * Class FilterBehavior
 * @package xhprof\filter
 */
class FilterBehavior extends BehaviorRegistrar
{


    /***
     * 过滤注册器
     */
    const BEHAVIOR_INJECTION = [
        /***
         * @var GatewayFilter 网关过滤器
         */
        GatewayFilter::class,
        /***
         * @var LimitFilter 限流过滤器
         */
        LimitFilter::class,
    ];

}