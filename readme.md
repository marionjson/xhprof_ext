### xhprof_ext

### 安装环境

- PHP 7.1+
- xhprof/tideways_xhprof 需要支持7.0以上环境


### 引入方式
- main.php 为引导入口
 ```shell script
### apache
php_admin_value auto_prepend_file "~/main.php"

### nginx 
fastcgi_param PHP_VALUE "~/main.php"
```

