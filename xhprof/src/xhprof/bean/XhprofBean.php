<?php

namespace xhprof\bean;

class XhprofBean
{

    /***
     * @var string 线程id
     */
    private $threadId;

    /***
     * @var ProcessDetailsBean 分析对象
     */
    public $processDetailsBean;

    /***
     * @var string 请求地址
     */
    public $url;

    /***
     * @var string 域名
     */
    public $serverName;

    /***
     * @var string 请求时间
     */
    public $requestTime;

    /***
     * @var string 请求时间
     */
    public $requestParam;

    /***
     * @var string 请求类型
     */
    public $requestMethod;

    /**
     * XhprofBean constructor.
     * @param ProcessDetailsBean $processDetailsBean
     */
    public function __construct(ProcessDetailsBean $processDetailsBean)
    {
        $this->threadId = uniqid();
        $this->processDetailsBean = $processDetailsBean;
        $this->url = PHP_SAPI === 'cli' ? implode(' ', $_SERVER['argv']) : $_SERVER['REQUEST_URI'];
        $this->requestMethod = PHP_SAPI === 'cli' ?'cli':$_SERVER['REQUEST_METHOD'];
        $this->serverName = !empty($_SERVER['SERVER_NAME'])?$_SERVER['SERVER_NAME']:"";
        $this->requestTime = !empty($_SERVER['REQUEST_TIME'])?$_SERVER['REQUEST_TIME']:time();
        $this->requestParam = $this->getRequestParams();
    }


    /***
     * 获取请求数据
     * @return string
     */
    private function getRequestParams()
    {
        if (PHP_SAPI === 'cli') {
            $params = $_SERVER['argc'];
        } elseif ($this->requestMethod == "GET") {
            $params = $_GET;
        } else {
            $params = $_POST ?: @file_get_contents('php://input');
        }
        return is_array($params)?implode('&',$params):$params;
    }

}