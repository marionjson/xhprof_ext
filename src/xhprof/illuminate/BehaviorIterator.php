<?php

namespace xhprof\illuminate;

use ArrayIterator;

/***
 * 行为迭代器抽象类
 * Interface BehaviorIterator
 * @package xhprof\bean
 */
trait BehaviorIterator
{

    /***
     * 获取布尔迭代器
     * @param array $arrayEnums
     * @param $behavior
     * @return BooleanIterator
     */
    public function getBooleanIterators($arrayEnums, $behavior)
    {
        return new BooleanIterator(new ArrayIterator($arrayEnums), $behavior);
    }


    /***
     * 迭代器注册行为
     * @param string $behavior 行为触发方法
     * @return bool
     */
    public function run($behavior)
    {
        foreach ($this->getBooleanIterators($this->getBehaviorInjectionByBehavior($behavior), $behavior) as $class)
            return false;
        return true;
    }

    /***
     * 获取行为列表
     * @param $behavior
     * @return array
     */
    abstract public function getBehaviorInjectionByBehavior($behavior);


}