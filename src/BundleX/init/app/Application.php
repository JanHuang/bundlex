<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/2/7
 * Time: 上午1:59
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */
class Application extends \FastD\Framework\Kernel\AppKernel
{
    /**
     * Register project bundles into the kernel.
     *
     * @return array
     */
    public function registerBundles()
    {
        return array(
        );
    }

    /**
     * Register custom kernel plugins.
     * Must return array.
     * examples:
     *  return array(
     *      "Monolog\\Logger"
     *  )
     *
     * @return array
     */
    public function registerService(\FastD\Container\Container $container){return [];}

    /**
     * @return array
     */
    public function registerConfigVariable(){return [];}

    /**
     * Register application configuration
     *
     * @param \FastD\Config\Config
     * @return void
     */
    public function registerConfiguration(\FastD\Config\Config $config){}

    /**
     * Register application configuration dynamic variable.
     *
     * @param \FastD\Config\Config $config
     * @return void
     */
    public function registerConfigurationVariable(\FastD\Config\Config $config)
    {
        // TODO: Implement registerConfigurationVariable() method.
    }
}