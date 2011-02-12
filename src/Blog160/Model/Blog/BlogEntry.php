<?php

namespace Blog160\Model\Blog;

use Mvc160\Model\DatabaseModel;

class BlogEntry extends DatabaseModel
{
  private $vars = array ();
  
  public function getDate()
  {
    return $this->vars ['date'];
  }
  
  public function getMessage()
  {
    return $this->vars ['message'];
  }
  
  public function getId()
  {
    return $this->vars ['id'];
  }
}