<?php

/****
 * 异常业务基类
 * Class BaseException
 */
class BaseException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        parent::__construct($message = "", $code = 0, $previous = null);
    }
}