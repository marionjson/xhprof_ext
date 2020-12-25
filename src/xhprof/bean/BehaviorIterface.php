<?php


namespace xhprof\bean;

/***
 * 行为接口
 * Interface BehaviorIterface
 * @package xhprof\bean
 */
interface BehaviorIterface
{

    public function before(...$params);

    public function after(...$params);

}