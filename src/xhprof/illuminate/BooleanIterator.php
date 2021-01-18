<?php


namespace xhprof\illuminate;


use FilterIterator;

/***
 * 布尔容器迭代注入
 * Class BooleanIterator
 * @package xhprof\illuminate
 */
class BooleanIterator extends FilterIterator
{

    /***
     * @var string $trigger
     */
    private $trigger;
    /**
     * @var Container $container
     */
    private $container;

    /**
     * @var bool $bool
     */
    private $bool = false;

    /***
     * BooleanIterator constructor.
     * @param \ArrayIterator $iterator
     * @param $trigger
     */
    public function __construct($iterator, $trigger)
    {
        parent::__construct($iterator);
        $this->trigger = $trigger;
        $this->container = Container::getInstance();
    }

    /***
     * 容器注入
     * @return bool
     * @throws \ReflectionException
     * @throws \xhprof\exception\BaseException
     */
    public function accept()
    {
        if (!$this->bool) {
            $this->container->bind($this->getInnerIterator()->current());
            $this->bool = $this->reverseBoolean(
                call_user_func(
                    [
                        $this->container->make(
                            $this->getInnerIterator()->current()
                        ),
                        $this->trigger
                    ]
                )
            );
            return $this->bool;
        }
        return true;
    }

    /***
     * 反转布尔器
     * @param $bool
     * @return bool
     */
    public function reverseBoolean($bool)
    {
        return $bool ? false : true;
    }
}