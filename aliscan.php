<?php
include_once __DIR__ . '/aliyuncs/aliyun-php-sdk-core/Config.php';
use Green\Request\V20170112 as Green;

$iClientProfile = DefaultProfile::getProfile("cn-shanghai", config('aliscan.accessKeyId'), config('aliscan.accessKeySecret')); // TODO
DefaultProfile::addEndpoint("cn-shanghai", "cn-shanghai", "Green", "green.cn-shanghai.aliyuncs.com");
$client = new DefaultAcsClient($iClientProfile);

//$request = new Green\TextScanRequest();

//return $request;