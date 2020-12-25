<?php
/***
 * Class xhprofUtil
 * @package xhprof\util
 */

namespace xhprof\util;

use think\Request;
use xhprof\bean\ProcessDetailsBean;
use xhprof\bean\XhprofBean;
use xhprof\bean\XhprofExtensionBean;
use xhprof\enmus\ExtensionEnums;

class RequestUtil extends Request
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
