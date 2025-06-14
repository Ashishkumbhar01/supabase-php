<?php

declare(strict_types=1);

namespace Supabase;

class Client
{
    protected string $url;

    protected string $apiKey;

    public function __construct(string $url, string $key)
    {
        $this->url = $url;
        $this->apiKey = $key;
    }
}
