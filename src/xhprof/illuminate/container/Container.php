<?php
namespace xhprof\illuminate\container;

/***
 * Interface Container 容器接口
 * @package xhprof\illuminate\container
 */
interface Container extends ContainerInterface
{
    /**
     * 在容器中注册绑定
     * @param $class
     * @return mixed
     */
    public function bind($class);

    /**
     * 读取容器，构建实例
     * @param $name
     * @return mixed
     */
    public function make($name);

}