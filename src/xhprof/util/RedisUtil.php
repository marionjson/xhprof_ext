<?php
/***
 * Class RedisUtil
 * @package xhprof\util
 */

namespace xhprof\util;

use Redis;
use xhprof\bean\BaseInstance;

class RedisUtil extends BaseInstance
{

    /**
     * @var Redis
     */
    private $handler;


    public function __construct()
    {
        $this->handler = new Redis();
        $config = ConfigUtil::read("redisConfig");
        // 连接redis服务端
        $this->handler->pconnect($config['host'], $config['port'], $config['timeOut']);
        // 密码认证
        if (isset($config['auth']) && $config['auth']) {
            $this->handler->auth($config['auth']);
        }
        if ($this->handler == null) {
            die('Redis 连接异常！');
        }
    }


    /**
     * 设置字符串缓存
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value)
    {
        return $this->handler->set($key, $value);
    }

    /**
     * 获取字符串缓存
     * @param $key
     * @return bool|string
     */
    public function get($key)
    {
        return $this->handler->get($key);
    }

    /***
     * @return Redis
     */
    public function handler()
    {
        return $this->handler;
    }

}
