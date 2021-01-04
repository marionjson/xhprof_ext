<?php
namespace xhprof\illuminate\container;

/***
 * 容器接口
 * Interface ContainerInterface
 */
interface ContainerInterface
{
    public function get($name);
    public function has($name);
}