<?php
namespace Mrlaozhou\Yar;

/**
 * Class ConcurrentClient
 *
 * @package Mrlaozhou\Yar
 */
class ConcurrentClient extends \Yar_Concurrent_Client
{
    /**
     * 注册一个并行的服务调用
     *
     * @param string   $uri
     * @param string   $method
     * @param array    $parameters
     * @param callable $callback
     *
     * @return int
     */
    public static function call ( string $uri , string $method , array $parameters , callable $callback  )
    {
        return parent::call ( $uri , $method , $parameters , $callback );
    }

    /**
     * 发送所有注册的并行调用
     *
     * @param callable $callback
     * @param callable $error_callback
     *
     * @return boolean
     */
    public static function loop(callable $callback, callable $error_callback)
    {
        return parent::loop($callback, $error_callback);
    }

    /**
     * @return  bool
     */
    public static function reset()
    {
        return parent::reset();
    }
}