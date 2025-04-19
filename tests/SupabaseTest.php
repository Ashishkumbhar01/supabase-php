<?php
declare(strict_types=1);
namespace Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Supabase\Client\Functions as Supabase;

#[CoversClass(Functions::class)]
class SupabaseTest extends TestCase
{
    #[Test]
    public function connected()
    {
        $client = new Supabase('https://uafnqazxrhgsrnxxazkg.supabase.co', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InVhZm5xYXp4cmhnc3JueHhhemtnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDAwOTM4MDQsImV4cCI6MjA1NTY2OTgwNH0.2FMd5u8-K7R6gSUFAp3SDzt766hGGHTVGRkdyNwGLAM');
        $this->assertInstanceOf(Supabase::class, $client);
       // $this->assertTrue($client->getAllData('Users'));
    }
}
