<?php
namespace Mrlaozhou\Yar;

/**
 * Class Server
 *
 * @package Mrlaozhou\Yar
 * @method __construct(\stdClass $object)
 */
final class Server extends \Yar_server
{

    /**
     * @return bool
     */
    public function handle()
    {
        return parent::handle();
    }

    /**
     * @param $instance
     *
     * @return bool
     */
    public static function boot($instance)
    {
        return (new self($instance))->handle();
    }
}