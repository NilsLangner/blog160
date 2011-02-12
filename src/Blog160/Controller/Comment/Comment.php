<?php

namespace Blog160\Controller\Comment;

class Comment 
{
  private $database;
  
  public function __construct(Database $database)
  {
    $this->database = $database;  
  }
}