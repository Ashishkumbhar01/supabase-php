<?php
namespace Supabase\Storage;

class Storage
{
  private $files;

  private function FilesType($files,$table)
  {
    if(!isset($files)){
      return "File not selected.";
    }
    if (!isset($table)) {
      return "please provide Table name.";
    }

    $extenions = ['txt','pdf','ppt','json','csv','mp3','mp4','ogg','webp','png','jpg','jpeg','gif','svg'];

  }
  
  public function uploadImages()
  {
    // Images
  }

  public function uploadVideos()
  {
    // Videos
  }

  public function uploadAudios()
  {
    // Audios
  }

  public function uploadFiles()
  {
    // files
  }
}
