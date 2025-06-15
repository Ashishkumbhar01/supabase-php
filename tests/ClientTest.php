<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Supabase\Client;

#[CoversClass(Client::class)]
final class ClientTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated(): void
    {
        $key = 'test-api-key';
        $url = 'https://api.example.com';

        $client = new Client($key, $url);

        $this->assertInstanceOf(Client::class, $client);
    }

    #[Test]
    public function it_throws_exception_with_invalid_url(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $key = 'test-api-key';
        $url = 'https://example.com';

        new Client($key, $url);
    }
}
