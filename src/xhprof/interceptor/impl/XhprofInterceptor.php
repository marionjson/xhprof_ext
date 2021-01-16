<?php

namespace xhprof\Interceptor\impl;


use xhprof\Interceptor\Interceptor;
use xhprof\Interceptor\InterceptorIterface;
use xhprof\service\XhprofService;

/***
 * Xhprof拦截器
 * Class GatewayInterceptor
 * @package xhprof\Interceptor
 */
class XhprofInterceptor extends Interceptor implements InterceptorIterface
{

    /***
     * Xhprof前置开启服务
     * @param mixed ...$params
     * @return bool|string
     */
    public function before(...$params): bool
    {
        // TODO: Implement beforeInterceptor() method.
        return XhprofService::enable();
    }

    /****
     * Xhprof后置结束服务
     * @param mixed ...$params
     * @return bool
     */
    public function after(...$params): bool
    {
        // TODO: Implement afterInterceptor() method.
        return XhprofService::disable();
    }
}