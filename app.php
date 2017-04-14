<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

use FastD\Application;
use FastD\Console\SeedRun;

$composer = include __DIR__.'/vendor/autoload.php';

$requires = $composer->getFallbackDirs() + $composer->getFallbackDirsPsr4();

class App extends Application
{
    protected $apps = [];

    public $migrations = [];

    public function registerPath($path)
    {
        $routes = $path.'/config/routes.php';
        if (file_exists($routes)) {
            $this->apps[] = $path;
            $this->migrations[] = $path.'/database/schema';
            include $routes;
        }
    }
}

class Run extends SeedRun
{
    public function getConfig()
    {
        $config = parent::getConfig();
        $paths = $config->offsetGet('paths');
        $paths['migrations'] = array_merge(
            app()->migrations,
            [
                $paths['migrations'],

            ]
        );
        $config->offsetSet('paths', $paths);

        return $config;
    }
}

$app = new App(__DIR__);

foreach ($requires as $require) {
    $app->registerPath($require.'/../');
}

return $app;