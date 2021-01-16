<?php


namespace xhprof\bean;


/***
 * 静态单例实体类 - 基类
 * Class BaseInstance
 * @package xhprof\enmus\bean
 */
class BaseInstance
{
    /***
     * @var array $instance
     */
    private static $instance;

    /***
     * 生成返回实例
     * @return BaseInstance
     */
    public static function getInstance()
    {
        $name = md5(serialize(get_called_class()));
        if (empty(self::$instance[$name])) {
            self::$instance[$name] = new static();
        }
        return self::$instance[$name];
    }

}