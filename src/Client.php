<?php

declare(strict_types=1);

namespace Supabase;

class Client
{
    protected string $url;

    protected string $apiKey;

    public function __construct(string $url, string $key)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
    throw new \InvalidArgumentException("Invalid URL: $url");
        } else if(!is_string($key)){
         throw \InvalidArgumentException("Invalid apiKey: $key");
        }else{

        $this->url = $url;
        $this->apiKey = $key;
        }
    }
}
