<?php

namespace xhprof\illuminate;

use ReflectionClass;
use xhprof\bean\BaseInstance;
use xhprof\exception\BaseException;

/***
 *
 * Class Container
 * @package xhprof\illuminate
 */
class Container extends ShutdownScheduler implements container\Container
{
    private $instances = array();

    /***
     * 容器填充
     * @param $name
     * @param $class
     */
    public function bind($class)
    {
        if (!$this->has($class)) {
            $this->instances[$this->getId($class)] = $class;
        }
    }

    /**
     * 读取容器，构建实例
     * @param $name
     * @return mixed|object
     * @throws BaseException
     * @throws \ReflectionException
     */
    public function make($name)
    {
        $id = $this->getId($name);
        if (!isset($this->instances[$id])) {
            throw new BaseException(sprintf("Can not find instance '%s', probably not injected", $name));
        }
        $this->instances[$id] = $this->build($this->instances[$id]);
        return $this->instances[$id];
    }

    /**
     * 容器实例
     * @param $className
     * @return mixed|object
     * @throws BaseException
     * @throws \ReflectionException
     */
    protected function build($className)
    {
        $reflector = new ReflectionClass($className);
        if (!$reflector->isInstantiable()) {
            return $reflector->newInstanceWithoutConstructor();
        } else {
            $constructor = $reflector->getConstructor();
            if (is_null($constructor)) {
                return new $className;
            }
            $parameters = $constructor->getParameters();
            $dependencies = $this->getDependencies($parameters);
            return $reflector->newInstanceArgs($dependencies);
        }
    }

    /**
     * 获取依赖
     * @param $parameters
     * @return array
     * @throws BaseException
     */
    protected function getDependencies($parameters)
    {
        $dependencies = [];
        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();
            //如果构造函数依赖的是一个类，则解析类的参数,否则递归解析类
            if (is_null($dependency)) {
                $dependencies[] = $this->resolveNonClass($parameter);
            } else {
                $dependencies[] = $this->resolveClass($dependency->name);
            }
        }
        return $dependencies;
    }

    /****
     * 检测参数依赖(无法获取该参数的类名)
     * @param $parameter
     * @return mixed
     * @throws BaseException
     */
    protected function resolveNonClass($parameter)
    {
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }
        throw new BaseException('the value:' . $parameter->name . ' miss default value');
    }

    /****
     * 检测参数依赖
     * @param $parameter
     * @return mixed
     */
    protected function resolveClass($parameter)
    {
        return $parameter->build();
    }

    /***
     * 获取容器类
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        // TODO: Implement get() method.
        $id = $this->getId($name);
        return !empty($this->instances[$id]) ? $this->instances[$id] : false;
    }

    /***
     * 检测容器类
     * @param $name
     * @return mixed
     */
    public function has($name)
    {
        // TODO: Implement has() method.
        if ($this->get($name)) {
            return true;
        }
        return false;
    }

    /**
     * 获取实例ID
     * @param $name
     * @return string
     */
    public function getId($name){
        return md5(serialize($name));
    }
}
