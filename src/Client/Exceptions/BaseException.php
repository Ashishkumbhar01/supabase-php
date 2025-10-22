<?php

declare(strict_types=1);

namespace Supabase\Client\Exceptions;

use Exception;
use Throwable;

interface ThrowableInterface extends Throwable
{
    public function getErrorCode(): int;
    public function getErrorMessage(): string;
    public function getContext(): array;

}

abstract class BaseException extends Exception implements ThrowableInterface
{
    protected array $context = [];

    public function __construct(
        string $message = "",
        int $code = 0,
        array $context = [],
        ?Throwable $previous = null
    ): mixed
    {
        parent::__construct($message, $code, $previous);
        $this->context = $context;
    }

    public function getErrorCode(): int
    {
        return $this->getCode();
    }

    public function getErrorMessage(): string
    {
        return $this->getMessage();
    }

    public function getContext(): array
    {
        return $this->context;
    }

    public function __toString(): string
    {
        return sprintf(
            "[%s] %s: %s (Code: %d) Context: %s",
            static::class,
            basename($this->getFile()),
            $this->getMessage(),
            $this->getCode(),
            json_encode($this->context)
        );
    }
}

