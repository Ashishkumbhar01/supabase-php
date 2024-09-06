<?php
use Supabase\Supabase\Supabase as Supabase;

require_once __DIR__."/vendor/autoload.php";

$url = "https://qbsctlzwkqcigickngub.supabase.co";
$key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InFic2N0bHp3a3FjaWdpY2tuZ3ViIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MjM4ODUxNjgsImV4cCI6MjAzOTQ2MTE2OH0.rwtjirssp6sdBSVGrwlqh8dDoQmoJOUEa3LUAFfn1SQ";

$client = new Supabase($url, $key, "users");

echo "<pre>";
//print_r($client);
$data = $client->get("users");

print_r($data);
