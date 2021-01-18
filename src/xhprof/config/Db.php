<?php
return [
    'debug' => false,
    'mode' => 'development',
    'extension' => 'tideways_xhprof',
    'save.handler' => 'mongodb',
    'redisConfig' => [
        'host'=>"127.0.0.1",
        'port'=>6379,
        'timeOut'=>100,
    ],
];