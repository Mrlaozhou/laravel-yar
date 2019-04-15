<?php
namespace Mrlaozhou\Yar;

/**
 * Class Client
 *
 * @package Mrlaozhou\Yar
 * @method __construct(string $url)
 */
class Client extends \Yar_client
{
    /**
     * @param int $name
     * @param     $value
     *
     * @return bool
     */
    public function setOpt($name, $value )
    {
        return parent::setOpt($name, $value);
    }

    /**
     * @param       $method
     * @param mixed ...$args
     *
     * @return mixed
     */
    public function touch($method, ...$args)
    {
        try{
            return $this->{$method}(...$args);
        }catch (\Yar_server_exception $exception) {
            return null;
        }
    }

    public function __call($name, $arguments)
    {
        return parent::__call($name, $arguments);
    }
}