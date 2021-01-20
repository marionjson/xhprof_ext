<?php
return [
    //extÀ©Õ¹
    'extension' => 'tideways_xhprof',

    //redisÅäÖÃ
    'redisConfig' => [
        'host' => "127.0.0.1",
        'port' => 6379,
        'timeOut' => 100,
    ],

    //mongoÅäÖÃ
    'mongoConfig' => [
        'host' => "mongodb://localhost:27017",
        'dbname' => "xhprof",
    ],
];