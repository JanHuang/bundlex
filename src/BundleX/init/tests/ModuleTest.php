<?php

/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/7/17
 * Time: 下午1:26
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */
class ModuleTest extends \PHPUnit_Framework_TestCase
{
    public function testModule()
    {
        $this->assertTrue(file_exists('./tests'));
        $this->assertTrue(file_exists('./src'));
        $this->assertTrue(file_exists('./web'));
    }
}