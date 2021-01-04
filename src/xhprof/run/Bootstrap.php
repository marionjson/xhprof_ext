<?php


namespace xhprof\run;


use xhprof\exception\BaseException;
use xhprof\filter\FilterBehavior;
use xhprof\illuminate\Container;
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
     * @var FilterBehavior
     */
    const FILTER_BEHAVIOR = "xhprof\\filter\\FilterBehavior";
    /***
     * @var InterceptorBehavior
     */
    const INTERCEPTOR_BEHAVIOR = "xhprof\\Interceptor\\InterceptorBehavior";

    /***
     * 容器注入
     * @var string[]
     */
    private static $containerInjectionList = [
        self::FILTER_BEHAVIOR,
        self::INTERCEPTOR_BEHAVIOR,
    ];

    /***
     * 引导程序入口
     */
    public static function run()
    {
        try {
            //注册配置
            ConfigUtil::injectionConfig();
            //注册运行 过滤器 和 拦截器
            $container = new Container();
            array_walk(self::$containerInjectionList, function ( $class) use ($container) {
                $container->bind($class);
            });
            $container->make(self::FILTER_BEHAVIOR)->register() &&
            $container->make(self::INTERCEPTOR_BEHAVIOR)->register();
        } catch (BaseException $e) {
            echo $e->getMessage();
        } catch (\ReflectionException $e) {
            echo $e->getMessage();
        }
    }


}

