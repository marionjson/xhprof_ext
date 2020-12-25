<?php

namespace xhprof\service;

use xhprof\bean\XhprofBean;
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
        $profProfile = XhprofUtil::disable();
        if ($profProfile instanceof XhprofBean) {
            //TODO 数据库存储实现
        }
        return true;
    }


}