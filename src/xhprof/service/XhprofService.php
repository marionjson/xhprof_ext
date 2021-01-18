<?php

namespace xhprof\service;

use Redis;
use xhprof\bean\BaseInstance;
use xhprof\bean\XhprofBean;
use xhprof\util\ConfigUtil;
use xhprof\util\RedisUtil;
use xhprof\util\XhprofUtil;

class XhprofService extends BaseInstance
{
    /**
     * @var RedisUtil
     */
    private $redis;

    /***
     * XhprofList
     * @var string
     */
    public $redisKey = "XhprofList";

    /***
     * 创角令牌桶
     * @param int $num
     */
    public function __construct()
    {
        $this->redis = RedisUtil::getInstance();
    }

    /****
     * 开启监控
     * @return bool
     */
    public function enable()
    {
        return XhprofUtil::enable();
    }

    /***
     * 关闭程序
     */
    public function disable()
    {
        $profProfile = XhprofUtil::disable();
        if ($profProfile instanceof XhprofBean) {
            //TODO 数据库存储实现
            $this->redis->handler()->lPush($this->redisKey,json_encode($profProfile));
        }
        return true;
    }


}