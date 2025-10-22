<?php

declare(strict_types=1);

namespace Supabase\Client;

final class Client
{
    private readonly string $url;
    private readonly string $token;

    public function __construct()
    {
        if($this->url === ''){
            throw new Exception('URL');
        }
            $ch = curl_init($this->url);
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
