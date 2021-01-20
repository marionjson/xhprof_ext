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

    /**
     * @var XhprofService
     */
    private $XhprofService;

    public function __construct()
    {
        $this->XhprofService =  XhprofService::getInstance();
    }

    /***
     * Xhprof前置开启服务
     * @param mixed ...$params
     * @return bool
     */
    public function before(...$params): bool
    {
        // TODO: Implement beforeInterceptor() method.
        return $this->XhprofService->enable();
    }

    /****
     * Xhprof后置结束服务
     * @param mixed ...$params
     * @return bool
     */
    public function after(...$params): bool
    {
        // TODO: Implement afterInterceptor() method.
        return $this->XhprofService->disable();
    }
}