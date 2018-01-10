<?php
$loader=require dirname(__FILE__).'/vendor/autoload.php';
//注册你的服务层目录
$loader->setPsr4("services\\", array(dirname(__FILE__)));
$loader->register();
$server = new \phpkit\microservice\Server();
$server->start();
