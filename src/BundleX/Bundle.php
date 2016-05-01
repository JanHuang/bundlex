<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/7/17
 * Time: 下午12:24
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\BundleX;

class Bundle
{
    public static function init()
    {
        $root = realpath('.');
        static::createBundle($root);
        static::createWeb($root);
        static::createSrc($root);
    }

    public static function createBundle($rootPath)
    {
        $boot = $rootPath . DIRECTORY_SEPARATOR . 'app';
        static::mkdir($boot);
        static::mkdir($boot . '/config');
        static::mkdir($boot . '/views');
        if (!file_exists($boot . '/Application.php')) {
            copy(__DIR__ . '/init/app/Application.php', $boot . '/Application.php');
        }
        if (!file_exists($boot . '/config/global.php')) {
            copy(__DIR__ . '/init/app/global.php', $boot . '/config/global.php');
        }
        if (!file_exists($boot . '/console')) {
            copy(__DIR__ . '/init/app/console', $boot . '/console');
        }
        $ignoreFile = $rootPath . '/.gitignore';
        if (!file_exists($ignoreFile)) {
            touch($ignoreFile);
        }
        $handle = fopen($ignoreFile, "r");
        $defineIgnore = [];
        if ($handle) {
            while (($buffer = fgetss($handle, 4096)) !== false) {
                $buffer = trim(str_replace(PHP_EOL, '', $buffer));
                if (!empty($buffer)) {
                    $defineIgnore[] = $buffer;
                }
            }
            fclose($handle);
        }

        $length = count($defineIgnore);

        if (empty($defineIgnore)) {
            file_put_contents($ignoreFile,
                <<<IGNORE
/app
/bin
/.idea
/vendor
/public

IGNORE
            );
        } else {
            foreach ($defineIgnore as $key => $val) {
                foreach (['/public', '/app', '/bin', '/.idea', '/vendor'] as $index => $ignore) {
                    if (false === @strpos($ignore, $val) && $key === $length) {
                        file_put_contents($ignoreFile, $ignore, FILE_APPEND);
                    }
                }
            }
        }
    }

    public static function createWeb($rootPath)
    {
        $web = $rootPath . DIRECTORY_SEPARATOR . 'public';
        static::mkdir($web);
        copy(__DIR__ . '/init/web/dev.php', $web . '/dev.php');
        copy(__DIR__ . '/init/web/prod.php', $web . '/prod.php');
        copy(__DIR__ . '/init/web/.htaccess', $web . '/.htaccess');
    }

    public static function createSrc($rootPath)
    {
        $src = $rootPath . DIRECTORY_SEPARATOR . 'src';
        static::mkdir($src);
    }

    protected static function mkdir($dir)
    {
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
    }
}