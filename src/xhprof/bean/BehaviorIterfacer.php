<?php


namespace xhprof\bean;

/***
 * 行为接口
 * Interface BehaviorIterfacer
 * @package xhprof\bean
 */
interface BehaviorIterfacer
{

    public function before(...$params);

    public function after(...$params);

}