<?php


namespace xhprof\bean;


/***
 *
 * Class JsonBean
 * @package xhprof\bean
 */
class JsonBean
{
    /**
     * 转为字符串
     * @param  $jsonObject
     * @return  string
     */
    public function __toJsonString($jsonObject = false)
    {
        return json_encode($this->__toArr($jsonObject));
    }

    /**
     * 转为数组
     * @param bool $jsonObject
     * @return array
     */
    private function __toArr($jsonObject): array
    {
        $jsonObject = $jsonObject ?: $this;
        $jsonArr = [];
        if ($jsonObject) {
            foreach ($jsonObject as $key => $vars) {
                if ($vars instanceof JsonBean) {
                    $arr = $vars->__toArr($vars);
                    $jsonArr[$key] = $arr;
                } else {
                    $jsonArr[$key] = $vars;
                }
            }
            return (array)$jsonArr;
        }
    }
}