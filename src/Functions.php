<?php
namespace Supabase;

class Functions extends Supabase {

  public static function getData(){
    $this->conn = $ch;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($ch);
    echo $result;
  }

  public static function postData(){

  }

  public static function updateData(){

  }

  public static function deleteData(){

  }
}
