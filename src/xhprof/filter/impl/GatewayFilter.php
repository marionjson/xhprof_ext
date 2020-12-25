<?php

namespace xhprof\filter\impl;


use xhprof\filter\FilteIterfacer;
use xhprof\filter\Filter;
use xhprof\util\ConfigUtil;

/***
 * 网关过滤器
 * Class GatewayFilter
 * @package xhprof\filter
 */
class GatewayFilter extends Filter implements FilteIterfacer
{

    /***
     * 前置过滤器校验
     * @param mixed ...$params
     * @return bool
     */
    public function beforeFilter(...$params)
    {
        // TODO: Implement beforeFilter() method.
        //域名拦截器
        if (ConfigUtil::read('ignore_url')) {
            foreach (ConfigUtil::read('ignore_url') as $url) {
                if (stripos($_SERVER['REQUEST_URI'], $url) !== FALSE) {
                    return false;
                }
            }
        }
        //路由拦截器
        if (ConfigUtil::read('ignore_url')) {
            foreach (ConfigUtil::read('ignore_url') as $url) {
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
    public function afterFilter(...$params)
    {
        // TODO: Implement afterFilter() method.
    }
}