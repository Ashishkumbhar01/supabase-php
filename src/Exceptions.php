<?php
declare(strict_types=1);
namespace Supabase;

class Exception{
  public static function Error()
  {
    throw new Exception('Error');
  } 
};
