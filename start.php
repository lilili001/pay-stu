<?php
require "vendor/autoload.php";

//定义回调  付款成功或付款失败后的回调
define('SITE_URL','http://39.108.225.36');

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ATP2EfifofYX1bFTKgFNOPbWky9sX74sr5REi_GOxjaY26J-ItcbqXa3AZmsm_SAtgmeMYOs9HnRDHml',
        'EK_0M5hIQmW2gYQ7k8zIfpVsLqLYNz-Kqdz-XwX4g0rMxNFjDBWUGzWZHBvJmQTMli8bDJFYrgxVer-8'
    )
);