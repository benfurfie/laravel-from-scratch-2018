<?php
/**
 * 
 */
namespace App\Services;

class Textlocal
{
  protected $apikey;

  public function __construct($apikey)
  {
    $this->apikey = $apikey;
  }
}