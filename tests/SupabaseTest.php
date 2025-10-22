<?php

namespace Supabase\Tests;

use PHPUnit\Framework\TestCase;
use Supabase\Client\Client;

class SupabaseTest extends TestCase
{
    public function setUp(): void
    {
        $client = new Client(
            "http://example.com",
            "sgefg"
        );
    }
}
