<?php
declare(strict_types=1);

namespace Supabase;
use Exception;

class Supabase
{
  private $apikey;
  protected $url;

  public function __construct(?string $url=null, ?string $apikey=null)
  {
    if(!filter_var($url, FILTER_VALIDATE_URL))
    {
      echo "Invalid URL format";
      exit();
    }

    if (!isset($url)){
      throw new Exception("Supabase URL must be specified");
    } elseif(!isset($apikey)){
      throw new Exception("Supabase API_KEY must be specified"); 
    } else {
      $this->apikey = $apikey;
      $this->url = $url ."/rest/v1";
    }
  }
  
  protected function grab(string $url, string $method, ?string $data=null)
  {
    $headers = array(
      "apikey: $this->apikey",
      "Authorization: Bearer $this->apikey",
      'Content-Type: application/json',
      'Accept: application/json',
      'Prefer: return=minimal',
      'Range: 0-9',
      'Prefer: resolution=merge-duplicates'
    );

    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_NOBODY => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => true,
      CURLOPT_SSL_VERIFYHOST => 2,
      CURLOPT_SSL_OPTIONS => CURLSSLOPT_NATIVE_CA,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTPHEADER => $headers,
      CURLOPT_CUSTOMREQUEST => $method,
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_ENCODING => "",
      CURLOPT_CONNECTTIMEOUT => 10,
      CURLOPT_FRESH_CONNECT => true,
      CURLOPT_FORBID_REUSE => true
    );

    $ch = curl_init();
    curl_setopt_array($ch, $options);
    if(isset($data)){
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }
    $html = curl_exec($ch);
    return $html;

    if(curl_errno($ch)){
      $error = curl_error($ch);
      echo json_encode($error, JSON_PRETTY_PRINT);
    }
    
    // Validate HTTP status code 
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if ($http_code !== 200) {
    echo "Request failed with status code $http_code";
    curl_close($ch);
    exit;
    }
    curl_close($ch);
  }
}
