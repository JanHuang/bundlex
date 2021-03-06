<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 16/5/1
 * Time: 下午8:02
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

namespace FastD\BundleX\Tests;

use FastD\BundleX\Bundle;
use FastD\Console\Output\ConsoleOutput;

class BundleTest extends \PHPUnit_Framework_TestCase
{
    public function testBundle()
    {
        $output = new ConsoleOutput();

        $this->expectOutputString($output->writeln('> bundle init'));

        Bundle::init(__DIR__ . '/init');
    }
}
