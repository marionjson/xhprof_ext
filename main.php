<?php

use xhprof\run\Bootstrap;
use xhprof\util\ConfigUtil;

require "src/autoload.php";

/***
 * 配置注入
 */
ConfigUtil::injectionConfig();
/**
 * @var Bootstrap $bootstrap
 */
$bootstrap = Bootstrap::getInstance();
if(!$bootstrap->run("register"))
    $bootstrap->clearShutdownEvent();
