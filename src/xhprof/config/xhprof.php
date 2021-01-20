<?php
/****
 * xhprof 配置
 */
return [
    /****
     * 只有 xhprof 底层扩展可以实现  tideways 扩展底层暂时无法实现
     * @doc https://www.php.net/manual/zh/function.xhprof-enable.php
     * @desc 就是通过传递 'ignored_functions' 选项来忽略性能分析中的某些函数
     */
    "xhprof_enable_config" => [
        "ignored_functions" => ["checkDomain", "checkIgnoreUrl"],
    ],
    /**
     * 忽略检测路由
     */
    "xhprof_ignore_route" => [],
    /**
     * 忽略检测域名
     */
    "xhprof_ignore_domain" => [],
];