<?php
namespace Supabase;

use Supabase\Supabase\Supabase;
use Dotenv\Dotenv;

class Functions extends Supabase{
  public $supabase;
  
  public function __construct(){
    $dotenv = Dotenv::createImmutable(APP_ROOT);
    $dotenv->load();
    $config = array(
      'url' => $_ENV['SB_URL'],
      'apikey' => $_ENV['SB_APIKEY']
    );
    
    $client = null;
    try{
      $this->supabase=$client;

      $client = new Supabase(
        $config['url'],
        $config['apikey']
      );
    } catch(Exception $e){
      echo "Error :". $e->getMessage();
    }
  }
}
