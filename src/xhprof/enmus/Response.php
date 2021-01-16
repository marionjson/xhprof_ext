<?php
// +----------------------------------------------------------------------
// | title:ChannelResponse.php
// +----------------------------------------------------------------------
// | Copyright:光娱游戏
// +----------------------------------------------------------------------
// | Author: zhangmingyong
// +----------------------------------------------------------------------
// | Date: 2020-05-20
// +----------------------------------------------------------------------
namespace xhprof\enmus;

use SplEnum;

/***
 * 渠道返回对象
 * Class Response
 */
class Response extends SplEnum
{

    public $code;

    public $data;

    /**
     * ChannelResponse constructor.
     * @param $code
     * @param $data
     */
    public function __construct($code, $data)
    {
        $this->code = $code;
        $this->data = $data;
    }

}