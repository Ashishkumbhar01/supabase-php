<?php
namespace Supabase\Supabase;

class Supabase {
  protected string $apikey;
  protected string $project_id;
  protected string $table;
  protected $conn;
  protected $url;

  public function __construct(string $url=null, string $apikey=null, string $table=null){
    
    $this->apikey = $apikey;
    $this->project_id = $url;
    $this->table = $table;

    // Supabase URL
    $this->url = $url;

    $url = "https://$this->project_id.supabase.co/rest/v1/$this->table";
    
    $header = array("apikey: $this->apikey",
      "Authorization: Bearer $this->apikey",
      "Content-Type: application/json",
      "prefer: return=representation");

    // CURL 
    $ch = null;
    $this->conn = $ch;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    
    $result = curl_exec($ch);
    
    if(curl_errno($ch)){
      echo "Error :". curl_error($ch);
      curl_close($ch);
    } else {
      $data = json_decode($result, true);
      echo "<pre>";
      print_r($data);
      echo "<pre>";
    }
  }

  public function postData(){
    
    $data = [
      "name" => "Sushil Kumar",
      "email" => "sushilkumar@gmail.com",
      "password" => "sushil@1234"
    ];

$url = "https://$this->project_id.supabase.co/rest/v1/$this->table";
// Set up the cURL request
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "apikey: $this->apikey",
    "Authorization: Bearer $this->apikey",
    "Content-Type: application/json",
    "Prefer: return=representation"
]);

// Execute the request and capture the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    // Output the response
    echo $response;
}

// Close the cURL session
curl_close($ch);

  }
}
