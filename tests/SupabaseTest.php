<?php
declare(strict_types=1);
namespace Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Supabase\Client\Functions as Supabase;
use Supabase\Client\Util\EnvSetup;

#[CoversClass(Functions::class)]
class SupabaseTest extends TestCase
{
    #[Test]
    public function setUp() :void
    {
        parent::setUp();
        $keys = EnvSetup::env(__DIR__.'/../');
        $key = $keys['API_KEY'];
        $url = $keys['URL'];

        $client = new Supabase($url, $key);
        $this->assertInstanceOf(Supabase::class, $client);
    }
}
