<?php
// +----------------------------------------------------------------------
// | title:ChannelEnums.php
// +----------------------------------------------------------------------
// | Copyright:光娱游戏
// +----------------------------------------------------------------------
// | Author: zhangmingyong
// +----------------------------------------------------------------------
// | Date: 2020-05-20
// +----------------------------------------------------------------------
namespace xhprof\enmus;

/***
 * Other接口状态码
 * Class ResponseEnums
 */
class ResponseEnums
{

    const SUCCESS = 200; //返回成功
    const ERROR = 500; //返回失败

    /**
     * 生成结果集
     * @param int $code 结果枚举
     * @param array|string $data 数据集
     * @return Response
     */
    public static function generateResponse($code, $data)
    {
        return new Response($code, $data);
    }
}