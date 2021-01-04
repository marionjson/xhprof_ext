<?php
/***
 * Class xhprofUtil
 * @package xhprof\util
 */

namespace xhprof\util;


class RequestUtil
{


    protected static $uuid ;
    /***
     * 获取UUID
     */
    public static function getUUID(){
        if(is_null(self::$uuid)){
            self::$uuid = uniqid();
        }
        return self::$uuid;
    }
}
