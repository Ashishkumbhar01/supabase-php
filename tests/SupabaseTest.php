<?php
declare(strict_types=1);
namespace Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Supabase\Client\Functions as Supabase;
use Dotenv\Dotenv;

#[CoversClass(Functions::class)]
class SupabaseTest extends TestCase
{
    #[Test]
    public function connected()
    {
        $dotenv = Dotenv::createImmutable(__DIR__."/../");
        $dotenv->load();

        $config = [
            'url' => $_ENV['URL'],
            'apikey' => $_ENV['APIKEY']
        ];

        $client = new Supabase($config['url'], $config['apikey']);
        $this->assertInstanceOf(Supabase::class, $client);
        // $this->assertTrue($client->getAllData('Users'));
    }
}
