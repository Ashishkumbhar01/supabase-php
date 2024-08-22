<?php
namespace Supabase;
use Supabase\Supabase\Supabase;

class Functions extends Supabase {

  public static function getData($url, $table){
    $headers = [];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    echo $result;
    curl_close($ch);
  }

  public static function postData(){

  }

  public static function updateData(){

  }

  public static function deleteData(){

  }
}
