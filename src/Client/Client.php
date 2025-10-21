<?php

declare(strict_types=1);

namespace Supabase\Client;

final class Client
{
    public function __construct(
        private ?string $url = null,
        private ?string $token = null
    ): void
    {
    }

    public function run()
    {
        //
    }
}
