<?php
//define("phpkitRoot", dirname(__FILE__));
$loader=require dirname(__FILE__).'/vendor/autoload.php';
//如果服务在本台机器，请注册服务，如果没有定义，系统会调用远程服务
// $loader->setPsr4("services\\", array(dirname(dirname(__FILE__))));
// $loader->register();

//定义TCP的服务端口
$serviceIps=array('127.0.0.1:8091');//服务中心的ip
$rpcClient = new \phpkit\microservice\Client($serviceIps);
//$rpcClient = new \phpkit\microservice\Client();
$class = $rpcClient->getService("services\\demo\\Hi");//用户查询服务

//开始调用 
$stime = microtime(true);
$count =100;
for ($i=0;$i<$count;$i++){
    $data = $class->say(array('test'=>1));
}
$etime = microtime(true);
$total = $etime - $stime;
//var_dump($data);
echo "<br />[发现服务{$count}次，页面执行时间：{$total} ]秒";