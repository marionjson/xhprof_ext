<?php

namespace xhprof\filter\impl;


use xhprof\filter\FilteIterface;
use xhprof\filter\Filter;
use xhprof\util\ConfigUtil;

/***
 * 网关过滤器
 * Class GatewayFilter
 * @package xhprof\filter
 */
class GatewayFilter extends Filter implements FilteIterface
{

    /***
     * 前置过滤器校验
     * @param mixed ...$params
     * @return bool
     */
    public function before(...$params): bool
    {
        // TODO: Implement beforeFilter() method.
        //域名拦截器
        if (ConfigUtil::read('xhprof_ignore_domain')) {
            foreach (ConfigUtil::read('xhprof_ignore_domain') as $url) {
                if (stripos($_SERVER['REQUEST_URI'], $url) !== FALSE) {
                    return false;
                }
            }
        }
        //路由拦截器
        if (ConfigUtil::read('xhprof_ignore_route')) {
            foreach (ConfigUtil::read('xhprof_ignore_route') as $url) {
                if (stripos($_SERVER['REQUEST_URI'], $url) !== FALSE) {
                    return false;
                }
            }
        }
        return true;
    }

    /***
     * 后置过滤器校验
     * @param mixed ...$params
     */
    public function after(...$params): bool
    {
        // TODO: Implement afterFilter() method.
        return true;
    }
}