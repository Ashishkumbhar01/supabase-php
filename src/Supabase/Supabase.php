<?php
namespace Supabase\Supabase;

class Supabase {
  private string|null $apikey;
  private string|null $project_id;
  private string|null $table;
  protected $conn;
  protected $url;

  public function __construct($url=null, $apikey=null, $table=null){
    if($url !="" && $apikey !="" && $table !=""){
      //$this->url = $url;
      $this->apikey = $apikey;
      $this->project_id = $url;
      $this->table = $table;
    } else {
      echo "Please provide Supabase full Details.\r\n"; 
    }
    
    $URL = "$this->project_id/rest/v1/$this->table";
    $this->url =$URL;

    $header = [
      "apikey: $this->apikey",
      "Authorization: Bearer $this->apikey",
      "Content-Type: application/json"
    ];

    // CURL 
    $ch = null;
    $this->conn = $ch;
    $this->conn = curl_init();
    curl_setopt($this->conn, CURLOPT_URL, $url);
    curl_setopt($this->conn, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($this->conn, CURLOPT_HTTPHEADER, $header);
    
    $result = curl_exec($this->conn);
    $data = json_decode($result, true);
    
    if(curl_errno($this->conn)){
      $err = curl_error($this->conn);
      echo "Error". $err;
      curl_close($this->conn);
    } else {
      if(isset($data['message'])){
        echo $data['message']."<br/>";
      }
    }
  }
  
  public function get($table=null, $query=[])
  {
    if(!isset($table)){
      echo "Please provide Supabase table name";
    } else {
      $this->table=$table;

      if(!isset($query)){
        $this->url=$this->url;
      } else {
        $this->url=$this->url."?select=$query";
      }
      $header = [
        "apikey: $this->apikey",
        "Authorization: Bearer $this->apikey",
        "Content-Type: application/json"
      ];

      $this->conn = curl_init();
      curl_setopt($this->conn, CURLOPT_URL, $this->url);
      curl_setopt($this->conn, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($this->conn, CURLOPT_HTTPHEADER, $header);
      $result = curl_exec($this->conn);
      $data = json_decode($result, true);

      if(curl_errno($this->conn)){
        echo "Error: ". curl_error($this->conn);
        curl_close($this->conn);
      } else {
        return $data;
      }
      
    }
  }

  public function post($table,$query=[])
  {
    // Set up the cURL request
    $this->conn = curl_init();
    curl_setopt($this->conn, CURLOPT_URL, $this->url);
    curl_setopt($this->conn, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($this->conn, CURLOPT_POST, true);
    curl_setopt($this->conn, CURLOPT_POSTFIELDS, json_encode($query));
    curl_setopt($this->conn, CURLOPT_HTTPHEADER, [
    "apikey: $this->apikey",
    "Authorization: Bearer $this->apikey",
    "Content-Type: application/json",
    "Prefer: return=minimal"
    ]);
    curl_setopt($this->conn, CURLOPT_TIMEOUT, 120);

    // Execute the request and capture the response
    
    $response = curl_exec($this->conn);
    $result = json_decode($response, true);
// Check for cURL errors

if (curl_errno($this->conn)) {
  echo 'Error:' . curl_error($this->conn);
  curl_close($this->conn);
} else {
  // Output the response
 echo "Data Post successfully";
  //  return $result;
}

// Close the cURL session
curl_close($this->conn);

  }

  public function update($table,$query=[]){
    if(!isset($table)){
      echo "Please provide your Supabase table name.";
    } elseif(!isset($query)){
      echo "Please provide your data.";
    } else {

    }

    $headers = [
     "apikey: $this->apikey",
      "Authorization: Bearer $this->apikey",
      "Content-Type: application/json",
      "Prefer: return=minimal"
    ];

    $this->conn = curl_init();
    curl_setopt($this->conn, CURLOPT_URL, $this->url);
    curl_setopt($this->conn, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($this->conn, CURLOPT_PUT, true);
    curl_setopt($this->conn, CURLOPT_POSTFIELDS, json_encode($query));
    curl_setopt($this->conn, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($this->conn, CURLOPT_TIMEOUT, 120);

    $response = curl_exec($this->conn);
    $result = json_decode($response, true);

    if(curl_errno($this->conn)){
      echo "Error: ". curl_error($this->conn);
      curl_close($this->conn);
    } else {
      echo "Data update successfully.";
      return $result;
    }
    curl_close($this->conn);
  }
}
