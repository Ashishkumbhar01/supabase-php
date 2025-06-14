<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Supabase\Client;

#[CoversClass(Client::class)]
class Setup extends TestCase
{
    #[Test]
    public function test_constructor_sets_url_and_api_key(): void
    {
        $url = 'https://test.supabase.io';
        $apiKey = 'test-api-key';

        $client = new Client($url, $apiKey);

        $urlProp = new \ReflectionProperty(Client::class, 'url');
        $urlProp->setAccessible(true);

        $apiKeyProp = new \ReflectionProperty(Client::class, 'apiKey');
        $apiKeyProp->setAccessible(true);

        $this->assertEquals($url, $urlProp->getValue($client));
        $this->assertEquals($apiKey, $apiKeyProp->getValue($client));
    }
}
