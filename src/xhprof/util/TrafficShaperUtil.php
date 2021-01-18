<?php
/***
 * 令牌桶扩展
 * Class TrafficShaperUtil
 * @package xhprof\util
 */

namespace xhprof\util;

use xhprof\bean\BaseInstance;

class TrafficShaperUtil extends BaseInstance
{
    /**
     * 最大令牌桶长度
     */
    protected $maxLimitToken;


    /***
     * 最大令牌桶时间-毫秒 (不建议使用)
     */
    protected $maximumWaitingTime;


    /***
     * 令牌桶配置
     * @var
     */
    protected $config;


    /***
     * redis key
     * @var
     */
    protected $redisKey = "TrafficShaperKey";


    /**
     * @var RedisUtil
     */
    private $redis;


    /***
     * 创角令牌桶
     * @param int $num
     */
    public function __construct()
    {
        $this->redis = RedisUtil::getInstance();
        $this->config = $this->config ?: ConfigUtil::read('traffic_shaper');
        $this->maxLimitToken = $this->maxLimitToken ?: $this->config['max_limit_token'];
    }


    /***
     * 领取令牌
     * @return bool
     */
    public function collect()
    {
        if (!empty($this->maxLimitToken) && $this->redis->handler()->lLen($this->redisKey) < $this->maxLimitToken) {
            return $this->redis->handler()->hSet($this->redisKey, RequestUtil::getUUID(),microtime());
        }
        return true;
    }

    /***
     * 释放令牌
     * @return bool
     */
    public function freed()
    {
        if ($this->redis->handler()->hGet($this->redisKey, RequestUtil::getUUID())) {
            return $this->redis->handler()->hDel($this->redisKey, RequestUtil::getUUID());
        }
        return true;
    }


    /***
     * 随机限流
     */
    public function rateLimit()
    {
        if (!empty($this->config['rate_limit']) && mt_rand(1,10) <= $this->config['rate_limit']*10) {
            return true;
        }
        return false;
    }
}
