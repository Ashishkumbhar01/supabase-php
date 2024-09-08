<?php
namespace Supabase;
use Supabase\Supabase\Supabase;

class Functions extends Supabase
{
  public function getAllData($table=null)
  {
    if (!isset($table)) {
      echo "Please provide your Supabase table name.";
    } else {
      $path = "$this->url/rest/v1/$table";
      $html = $this->grab($path, "GET");
      $data = json_decode($html, true);
      return $data;
    }
  }

  public function getSingleData($table=null, $query=[])
  {
    if (!isset($table)) {
      echo "Please provide your Supabase table name.";
    } elseif(!isset($query)) {
      echo "Please provide your column name.";
    } else {
      $path = "$this->url/rest/v1/$table?select=$query";
      $html = $this->grab($path, "GET");
      $data = json_decode($html, true);
      return $data;
    }
  }

  public function postData($table=null, $query=[])
  {
    if (!isset($table)) {
      echo "Please provide your Supabase table name.";
    } elseif (!isset($query)) {
      echo "Please provide your data.";
    } else {
      $path = "$this->url/rest/v1/$table";
      $html = $this->grab($path, "POST", json_encode($query));
      return $html;
    }
  }

  public function updateData($table=null, int $id=null, $query=[])
  {
    if (!isset($table)) {
      echo "Please provide your Supabase table name.";
    } elseif (!isset($id)) {
      echo "Please provide id.";
    } elseif (!isset($query)) {
      echo "Please provide your data.";
    } else {
      $path = "$this->url/rest/v1/$table?id=eq.$id";
      $html = $this->grab($path, "PATCH", json_encode($query));
      return $html;
    }
  }

  public function deleteData($table=null, int $id=null)
  {
    if (!isset($table)) {
      echo "Please provide your Supabase table name.";
    } elseif (!isset($id)) {
      echo "Please provide id.";
    } else {
      $path = "$this->url/rest/v1/$table?id=eq.$id";
      $html = $this->grab($path, "DELETE");
      return $html;
    }
  }
}
