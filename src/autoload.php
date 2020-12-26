<?php
if (!defined('XHPROF_ROOT')) {
    define("XHPROF_ROOT", "src" . DIRECTORY_SEPARATOR . "xhprof" . DIRECTORY_SEPARATOR);
}
if (!defined('XHPROF_CONFIG')) {
    define("XHPROF_CONFIG", XHPROF_ROOT . "config" . DIRECTORY_SEPARATOR);
}

spl_autoload_register(function ($className) {
    if ((strlen($className) > 6) && (strtolower(substr($className, 0, 6)) === "xhprof")) {
        if ($className{6} === '\\') {
            include __DIR__ . DIRECTORY_SEPARATOR . str_replace("\\", DIRECTORY_SEPARATOR, $className) . ".php";
        }
        return true;
    }
    return false;
});
