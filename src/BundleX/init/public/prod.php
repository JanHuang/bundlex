<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/7/17
 * Time: 下午1:35
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

$loader = include __DIR__ . '/../vendor/autoload.php';

if (!class_alias('\Application') && file_exists(__DIR__ . '/../app/application.php')) {
    include __DIR__ . '/../app/application.php';
}

use FastD\Framework\Kernel\AppKernel;

$app = new Application(AppKernel::ENV_PROD);
$app->boot();
$response = $app->createHttpRequestHandler();
$response->send();
$app->shutdown($app);