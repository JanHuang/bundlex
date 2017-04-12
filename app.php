<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

use FastD\Application;

$composer = include __DIR__.'/vendor/autoload.php';

$requires = $composer->getFallbackDirs() + $composer->getFallbackDirsPsr4();

class App extends Application
{
    protected $apps = [];

    public function registerPath($path)
    {
        $this->apps[] = $path;
        include $path.'/config/routes.php';
    }
}

$app = new App(__DIR__);

foreach ($requires as $require) {
    $app->registerPath($require . '/../');
}

return $app;