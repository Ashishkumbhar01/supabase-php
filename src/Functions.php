<?php
namespace Supabase;

use Supabase\Supabase\Supabase;
use Dotenv\Dotenv;

class Functions extends Supabase{
  public function __construct(){
    $dotenv = Dotenv::createImmutable(APP_ROOT);
    $dotenv->load();

    $config = array(
      'url' => $_ENV['SB_URL'],
      'apikey' => $_ENV['SB_APIKEY']
    );
    
    $supabase = new Supabase(
      $config['url'],
      $config['apikey']
    );
  }
  
  public static function getAllData(string $table): void
  {
    echo $table;
    // $supabase->get();
  }
}

//new Functions();
