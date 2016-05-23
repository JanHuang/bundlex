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

use FastD\Console\IO\Output;

/**
 * Class Bundle
 *
 * @package FastD\BundleX
 */
class Bundle
{
    /**
     * @var string
     */
    protected $initPath = __DIR__ . '/init';

    /**
     * @var array
     */
    protected $directories = [
        'bin',
        'public',
    ];

    /**
     * @var array
     */
    protected $files = [
        __DIR__ . '/init/app/application.php',
        __DIR__ . '/init/bin/console',
        __DIR__ . '/init/public/.htaccess',
        __DIR__ . '/init/public/dev.php',
        __DIR__ . '/init/public/prod.php',
        __DIR__ . '/init/public/favicon.ico',
    ];

    /**
     * @var string
     */
    protected $ignore;

    /**
     * @var string
     */
    protected $path;

    /**
     * Bundle constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->setPath($path);
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return array
     */
    public function getDirectories()
    {
        return $this->directories;
    }

    /**
     * @param array $directories
     * @return $this
     */
    public function setDirectories($directories)
    {
        $this->directories = $directories;
        return $this;
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param array $files
     * @return $this
     */
    public function setFiles($files)
    {
        $this->files = $files;
        return $this;
    }

    /**
     * @return string
     */
    public function getIgnore()
    {
        return $this->ignore;
    }

    /**
     * @param string $ignore
     * @return $this
     */
    public function setIgnore($ignore)
    {
        if (!file_exists($ignore)) {
            throw new \RuntimeException(sprintf('Ignore setting ["%s"] is not such.', $ignore));
        }
        $this->ignore = $ignore;
        return $this;
    }

    /**
     * @param string $action
     * @return int
     */
    public function run($action)
    {
        $this->targetDirectories();
        $this->targetFiles();
        $this->targetIgnore();

        $output = new Output();

        $output->writeln(sprintf('> bundle %s', $action ?? 'init'));

        unset($output);
    }

    /**
     * @return bool
     */
    protected function targetDirectories()
    {
        foreach ($this->directories as $directory) {
            $directory = str_replace('//', '/', $this->getPath() . DIRECTORY_SEPARATOR . $directory);
            $this->targetDir($directory);
        }

        return true;
    }

    /**
     * @return bool
     */
    protected function targetFiles()
    {
        foreach ($this->files as $file) {
            if (is_dir(dirname($file))) {
                $toFile = str_replace($this->initPath, $this->getPath(), $file);
                if (!file_exists($toFile)) {
                    if (copy($file, $toFile)) {
                        continue;
                    }
                }
            }
        }

        return true;
    }

    /**
     * @return int
     */
    protected function targetIgnore()
    {
        $file = str_replace('//', '/', $this->getPath() . DIRECTORY_SEPARATOR . '.gitignore');
        if (null !== $this->ignore) {
            $ignore = explode(PHP_EOL, file_get_contents($this->ignore));
        } else {
            $ignore = [
                '/bin',
                '/vendor',
                '/public',
                '/.idea',
                '/.setting',
                'bundle',
            ];
        }

        array_filter($ignore);

        if (file_exists($file)) {
            $custom = file_get_contents($file);
            $ignore = array_merge($ignore, explode(PHP_EOL, $custom));
            unset($custom);
        }

        return file_put_contents($file, implode(PHP_EOL, array_unique($ignore)));
    }

    /**
     * @param $dir
     * @return bool
     */
    protected function targetDir($dir)
    {
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        return true;
    }

    /**
     * @param string $path
     * @param string $action
     * @return int
     */
    public static function init($path = ' . ', $action = 'init')
    {
        $bundle = new Bundle(realpath($path));

        return $bundle->run($action);
    }
}