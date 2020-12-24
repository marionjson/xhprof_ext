<?php
/***
 * Class xhprofUtil
 * @package xhprof\util
 */

namespace xhprof\util;

use xhprof\bean\ProcessDetailsBean;
use xhprof\bean\XhprofBean;
use xhprof\bean\XhprofExtensionBean;
use xhprof\enmus\ExtensionEnums;

class XhprofUtil
{
    private static $extension;

    /****
     * 初始化Extension扩展
     * @return bool|string
     */
    public static function initExtension()
    {
        foreach (ExtensionEnums::EXTENSION_LIST as $extension) {
            if (extension_loaded($extension)) {
                return new XhprofExtensionBean($extension);
            }
        }
        return false;
    }

    /****
     * 启动 xhprof 进行性能分析。
     * @return bool
     */
    public static function enable()
    {
        self::$extension = self::initExtension();
        $xhprof_enable_config = ConfigUtil::read("xhprof_enable_config");
        if (is_array($xhprof_enable_config) && !empty($xhprof_enable_config) && self::$extension->getExtension() == "xhprof") {
            call_user_func(
                self::$extension->getExtension() . '_enable',
                self::$extension->getFlagsCpu() | self::$extension->getFlagsMemory(),
                $xhprof_enable_config
            );
        } else {
            call_user_func(
                self::$extension->getExtension() . '_enable',
                self::$extension->getFlagsCpu() | self::$extension->getFlagsMemory()

            );
        }
        return true;
    }

    /***
     * 停止 xhprof 分析器,返回分析数据
     * @return XhprofBean
     */
    public static function disable()
    {
        return new XhprofBean(new ProcessDetailsBean(call_user_func(self::$extension->getExtension() . '_disable')));
    }
}
