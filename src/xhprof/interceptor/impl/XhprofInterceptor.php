<?php

namespace xhprof\Interceptor\impl;


use phpDocumentor\Reflection\Types\Boolean;
use xhprof\Interceptor\Interceptor;
use xhprof\Interceptor\InterceptorIterfacer;
use xhprof\service\XhprofService;

/***
 * Xhprof拦截器
 * Class GatewayInterceptor
 * @package xhprof\Interceptor
 */
class XhprofInterceptor extends Interceptor implements InterceptorIterfacer
{

    /***
     * Xhprof前置开启服务
     * @param mixed ...$params
     * @return bool|string
     */
    public function before(...$params)
    {
        // TODO: Implement beforeInterceptor() method.
        return XhprofService::enable();
    }

    /****
     * Xhprof后置结束服务
     * @param mixed ...$params
     * @return bool
     */
    public function after(...$params)
    {
        // TODO: Implement afterInterceptor() method.
        return XhprofService::disable();
    }
}