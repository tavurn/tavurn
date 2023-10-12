<?php

namespace App\Exceptions;

use Exception;
use OpenSwoole\Core\Psr\Response;
use Psr\Http\Message\ResponseInterface;

class RenderedException extends Exception
{
    public function render(): ResponseInterface
    {
        return new Response('<h1>Oops!</h1>'.self::class);
    }
}