<?php

declare(strict_types=1);

namespace Supabase\Client;

final class Client
{
    private string $url;
    private string $token;

    public function __construct()
    {
        $ch = curl_init();

    }

    public function setURL(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function getURL(): string
    {
        return $this->url;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    // public function excute(){}
}
