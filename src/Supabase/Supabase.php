<?php
namespace Supabase\Supabase;
use Exception;

class Supabase
{
  private string|null $apikey;
  private string|null $project_id;
  protected string|null $table = null;
  protected $conn;
  protected $url;
  public $data;

  public function __construct($url=null, $apikey=null){
    if (!isset($url)){
      throw new Exception("Supabase URL must be specified");
    } elseif(!isset($apikey)){
      throw new Exception("Supabase API_KEY must be specified", 1); 
    } else {
      $this->apikey = $apikey;
      $this->project_id = $url;
    }

    $URL = "$this->project_id/rest/v1/$this->table";
    $this->url = $URL;

    $headers = [
      "apikey: $this->apikey",
      "Authorization: Bearer $this->apikey",
      "Content-Type: application/json",
    ];

    // CURL
    $ch = null;
    $this->conn = $ch;
    $this->conn = curl_init($url);

    $options = [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 120,
      CURLOPT_ENCODING => "UTF-8", 
      CURLOPT_HTTPHEADER => $headers,
      CURLOPT_CONNECTTIMEOUT => 120,   
    ];
    
    curl_setopt_array($this->conn, $options);
    
    $result = curl_exec($this->conn);
    $data = json_decode($result, true);

    if (curl_errno($this->conn)) {
      $err = curl_error($this->conn);
      echo "Error" . $err;
      curl_close($this->conn);
    } else {
      if (isset($data["message"])) {
        echo $data["message"] . "<br/>";
      }
    }
  }

  public function getAllData($table = null)
  {
    if (!isset($table)) {
      echo "Please provide Supabase table name";
    } else {
      //$this->url=$this->url."?select=$query";
      $this->table = $table;
      $URL="$this->project_id/rest/v1/$this->table";
      $this->url = $URL;

      $header = [
        "apikey: $this->apikey",
        "Authorization: Bearer $this->apikey",
        "Content-Type: application/json",
      ];

      $this->conn = curl_init();
      curl_setopt($this->conn, CURLOPT_URL, $this->url);
      curl_setopt($this->conn, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($this->conn, CURLOPT_HTTPHEADER, $header);
      $result = curl_exec($this->conn);
      $data = json_decode($result, true);

      if (curl_errno($this->conn)) {
        echo "Error: ". curl_error($this->conn);
        curl_close($this->conn);
      } else {
        return $data;
      }
    }
  }

  public function getSingleData($table = null, $query = [])
  {
    if (!isset($table)) {
      echo "Please provide table name.";
    } else {

      $this->table = $table;
      $URL="$this->project_id/rest/v1/$this->table";
      $this->url = $URL;

      $this->url=$this->url."?select=$query";
      $header = [
        "apikey: $this->apikey",
        "Authorization: Bearer $this->apikey",
        "Content-Type: application/json",
      ];

      $this->conn = curl_init();
      curl_setopt($this->conn, CURLOPT_URL, $this->url);
      curl_setopt($this->conn, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($this->conn, CURLOPT_HTTPHEADER, $header);
      $result = curl_exec($this->conn);
      $data = json_decode($result, true);
      if (curl_errno($this->conn)) {
        echo "Error: " . curl_error($this->conn);
        curl_close($this->conn);
      } else {
        return $data;
      }
    }
  }

  public function postData($table = null, $query = [])
  {
    if (!isset($table)) {
      echo "Please provide your Supabase table name.";
    } elseif (!isset($query)) {
      echo "Please insert your data.";
    } else {
      $this->table = $table;
      $URL = "$this->project_id/rest/v1/$this->table";
      $this->url = $URL;

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
        "Prefer: return=minimal",
      ]);
      curl_setopt($this->conn, CURLOPT_TIMEOUT, 120);
      // Execute the request and capture the response
      $response = curl_exec($this->conn);
      $result = json_decode($response, true);
      // Check for cURL errors
      if (curl_errno($this->conn)) {
        echo "Error:" . curl_error($this->conn);
        curl_close($this->conn);
      } else {
        // Output the response
        echo "Data Post successfully";
      }
      // Close the cURL session
      curl_close($this->conn);
    }
  }

  public function updateData($table = null, int $id = null, $query = [])
  {
    if (!isset($table)) {
      echo "Please provide your Supabase table name.";
    } elseif (!isset($query)) {
      echo "Please provide your data.";
    } elseif (!isset($id)) {
      echo "Please provide id number.";
    } else {
      $this->table = $table;
      $URL="$this->project_id/rest/v1/$this->table";
      $this->url = $URL;
      $this->url = $this->url."?id=eq.$id";
    }

    $headers = [
      "apikey: $this->apikey",
      "Authorization: Bearer $this->apikey",
      "Content-Type: application/json",
      "Prefer: return=minimal",
    ];

    $this->conn = curl_init();
    curl_setopt($this->conn, CURLOPT_URL, $this->url);
    curl_setopt($this->conn, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($this->conn, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($this->conn, CURLOPT_POSTFIELDS, json_encode($query));
    curl_setopt($this->conn, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($this->conn, CURLOPT_TIMEOUT, 120);

    $response = curl_exec($this->conn);
    $result = json_decode($response, true);

    if (curl_errno($this->conn)) {
      echo "Error: " . curl_error($this->conn);
      curl_close($this->conn);
    } else {
      echo "Data updated successfully.";
      return $result;
    }
    curl_close($this->conn);
  }

  public function deleteData($table = null, int $id = null)
  {
    if (!isset($table)) {
      echo "Please provide your Supabase table name.";
    } elseif (!isset($id)) {
      echo "Please provide id.";
    } else {
      $this->table = $table;
      $URL = "$this->project_id/rest/v1/$this->table";
      $this->url = $URL;
      
      $this->url = $this->url."?id=eq.$id";

      $headers = [
        "apikey: $this->apikey",
        "Authorization: Bearer $this->apikey",
        "Content-Type: application/json",
      ];

      $this->conn = curl_init();
      curl_setopt($this->conn, CURLOPT_URL, $this->url);
      curl_setopt($this->conn, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($this->conn, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($this->conn, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($this->conn, CURLOPT_POSTFIELDS, json_encode($id));
      curl_setopt($this->conn, CURLOPT_TIMEOUT, 120);

      $response = curl_exec($this->conn);
      $result = json_decode($response, true);
      if (curl_errno($this->conn)) {
        echo "Error: " . curl_error($this->conn);
        curl_close($this->conn);
      } else {
        echo "Your data delete successfully.";
        return $result;
      }
      curl_close($this->conn);
    }
  }
}
