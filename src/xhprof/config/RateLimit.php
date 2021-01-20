<?php
/****
 * 限流器配置
 */
return [
    /***
     * @var  \xhprof\util\TrafficShaperUtil 令牌桶配置管理
     */
    "traffic_shaper" => [
        //最大令牌桶数量
        "max_limit_token" => 100,
        //最大等待时长-毫秒
        "max_wait_time" => 1000,
        //百分比限流
        "rate_limit" => 1
    ],

];