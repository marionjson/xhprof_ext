<?php

use xhprof\run\Bootstrap;
use xhprof\util\ConfigUtil;

require "src/autoload.php";

/***
 * 配置注入
 */
ConfigUtil::injectionConfig();
/**
 * 启动引导文件
 * @var Bootstrap $bootstrap
 */
$bootstrap = Bootstrap::getInstance();
if(!$bootstrap->register(Bootstrap::REGISTER_BEHAVIOR))
    $bootstrap->clearShutdownEvent();
