<?php


namespace xhprof\run;


use xhprof\bean\BaseInstance;
use xhprof\filter\InitFilter;
use xhprof\Interceptor\InitInterceptor;
use xhprof\util\ConfigUtil;
use xhprof\util\ShutdownScheduler;

/***
 * 引导程序
 * Class Bootstrap
 * @package xhprof\run
 */
class Bootstrap
{

    /***
     * 引导程序入口
     */
    public static function run()
    {
        try {
            //注册配置
            ConfigUtil::injectionConfig();
            //注册运行 过滤器 和 拦截器
            InitFilter::getInstance()->register() &&
            InitInterceptor::getInstance()->register();
        } catch (\BaseException $exception) {
            echo $exception->getMessage();
        }
    }


}

