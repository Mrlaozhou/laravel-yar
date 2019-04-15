<?php

namespace Mrlaozhou\Yar\Exceptions;

use Throwable;

class ExtensionNotLoadedException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}