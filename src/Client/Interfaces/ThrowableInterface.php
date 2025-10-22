<?php

declare(strict_types=1);

namespace Supabase\Client\Interfaces;

use Throwable;

interface ThrowableInterface extends Throwable
{
    public function getErrorCode(): int;
    public function getErrorMessage(): string;
    public function getContext(): mixed;

}
