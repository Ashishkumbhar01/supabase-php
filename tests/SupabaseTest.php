<?php

declare(strict_types=1);

namespace Supabase\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Supabase\Client\Client;

#[CoversClass(Client::class)]
class SupabaseTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        $this->client = new Client();

        $this->client->setURL("https://example.com")->setToken('password');
    }

    #[Test]
    public function connect()
    {
        $this->assertSame('https://example.com', $this->client->getURL());
        $this->assertSame('password', $this->client->getToken());
    }
}
