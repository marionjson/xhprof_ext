<?php
/***
 * Class MongoUtil
 * @package xhprof\util
 */

namespace xhprof\util;

use MongoDB\Driver\Manager;
use xhprof\bean\BaseInstance;

class MongoUtil extends BaseInstance
{

    /**
     * @var Manager
     */
    private $handler;
    /**
     * @var array
     */
    private $config;


    public function __construct()
    {
        $this->config = ConfigUtil::read("mongoConfig");
        $this->handler = new Manager($this->config['host']);
        if ($this->handler == null) {
            die('mongo 连接异常！');
        }
    }


    /**
     * 数据存储
     * @param $table
     * @param $data
     * @return \MongoDB\Driver\WriteResult
     */
    public function insert($table, $data)
    {
        $Bulk = $this->getBulkWrite();
        $Bulk->insert($data);
        return $this->handler->executeBulkWrite($this->config['dbname'].".".$table, $Bulk);
    }


    /***
     * @return Manager
     */
    public function handler()
    {
        return $this->handler;
    }

    /**
     * @return \MongoDB\Driver\BulkWrite
     */
    private function getBulkWrite(): \MongoDB\Driver\BulkWrite
    {
        return new \MongoDB\Driver\BulkWrite;
    }

}
