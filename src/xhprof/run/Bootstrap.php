<?php


namespace xhprof\run;


use xhprof\filter\FilterBehavior;
use xhprof\Interceptor\InterceptorBehavior;
use xhprof\util\ConfigUtil;

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
            FilterBehavior::getInstance()->register() &&
            InterceptorBehavior::getInstance()->register();
        } catch (\BaseException $exception) {
            echo $exception->getMessage();
        }
    }


}

