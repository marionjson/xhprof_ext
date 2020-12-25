<?php

namespace xhprof\filter\impl;


use xhprof\filter\FilteIterface;
use xhprof\filter\Filter;
use xhprof\util\ConfigUtil;
use xhprof\util\TrafficShaperUtil;

/***
 * 限流过滤器
 * Class LimitFilter
 * @package xhprof\filter
 */
class LimitFilter extends Filter implements FilteIterface
{


    /**
     * @var TrafficShaperUtil
     */
    private $trafficShaper;

    public function __construct()
    {
        $this->trafficShaper = TrafficShaperUtil::getInstance();
    }

    /***
     * 前置过滤器校验
     * @param mixed ...$params
     * @return bool
     */
    public function before(...$params)
    {
        // TODO: Implement beforeFilter() method.
        //限流处理，获取令牌
        if ($this->trafficShaper->rateLimit() && $this->trafficShaper->collect()) {
            return true;
        }
        return false;
    }

    /***
     * 后置过滤器校验
     * @param mixed ...$params
     * @return bool
     */
    public function after(...$params)
    {
        // TODO: Implement afterFilter() method.
        //释放令牌
        if ($this->trafficShaper->freed()) {
            return true;
        }
        return false;
    }
}