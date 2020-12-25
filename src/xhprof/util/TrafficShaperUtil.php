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
     *
     */
    protected static $maxLimitToken  ;


    /***
     * 最大令牌桶时间-毫秒
     */
    protected static $maximumWaitingTime;


    /***
     * 令牌桶配置
     * @var
     */
    protected static $config;


    /***
     * 创角令牌桶
     * @param int $num
     */
    public static function create($num){
        self::$config = ConfigUtil::read('traffic_shaper');
        self::$maxLimitToken  = $num?:self::$config['max_limit_token'];
        if(self::$maxLimitToken>0){
        }
    }


    /***
     * 领取令牌
     */
    public static function collect(){

    }

}
