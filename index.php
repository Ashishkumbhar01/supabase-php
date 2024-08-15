<?php
require_once "vendor/autoload.php";

use Supabase\Supabase;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config =[
  'project_id'=>$_ENV['project_id'],
  'apikey'=>$_ENV['apikey'],
  'table'=>$_ENV['table']
];

$app = new Supabase($config['project_id'], $config['apikey'], $config['table']);
//$app->postData();
