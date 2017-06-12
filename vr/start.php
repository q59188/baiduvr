<?php

// 载入composer的autoload文件
include __DIR__ . '/vendor/autoload.php';

$database = [
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'vrs',
    'username'  => 'root',
    'password'  => 'qwe123456',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as db;//如果你不喜欢这个名称，as DB;就好 

$capsule = new db;

// 创建链接
$capsule->addConnection($database);

// 设置全局静态可访问
$capsule->setAsGlobal();

// 启动Eloquent
$capsule->bootEloquent();
