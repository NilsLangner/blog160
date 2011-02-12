<?php

namespace Blog160\Model\Blog;

use Mvc160\Database\Database;

use Mvc160\Model\DatabaseModel;

class BlogEntry extends DatabaseModel
{
  protected $vars = array ();
  
  protected function getTableName( )
  {
    return 'blog_entries';
  }
  
  public function __construct(Database $database)
  {
    parent::__construct($database);
  }
  
  public function getDate()
  {
    return $this->vars ['date'];
  }
  
  public function getMessage()
  {
    return $this->vars ['message'];
  }
  
  public function setMessage($message)
  {
    $this->vars ['message'] = $message;
  }
  
  public function setDate($date)
  {
    $this->vars ['date'] = $date;
  }
  
  public function getAll()
  {
    return $this->query('SELECT * FROM blog_entries ORDER BY id DESC');
  }
}