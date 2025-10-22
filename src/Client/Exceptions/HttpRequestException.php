<?php

declare(strict_types=1);

namespace Supabase\Client\Exceptions;

use Supabase\Client\Interfaces\HttpExceptionInterface;

use RuntimeException;

require_once(__DIR__."/../Interfaces/HttpExceptionInterface.php");

abstract class HttpRequestException extends RuntimeException implements HttpExceptionInterface
{
    public function getStatusCode(): int
    {
        return $this->code;
    }

    public function getReasonPhrase(): string
    {
        return $this->message;
    }
}
