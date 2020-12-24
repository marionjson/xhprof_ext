<?php

namespace xhprof\service;

use xhprof\bean\XhprofExtensionBean;
use xhprof\util\XhprofUtil;

class XhprofService
{
    /**
     * @var XhprofExtensionBean
     */
    private static $extension;

    public function __construct()
    {
    }

    /****
     * 开启监控
     * @return bool
     */
    public static function enable()
    {
        return XhprofUtil::enable();
    }


    /***
     * 关闭程序
     */
    public static function disable()
    {
        $xhprofProfile = XhprofUtil::disable();
        if ($xhprofProfile) {
            //TODO 数据库存储实现
        }
        return true;
    }


}