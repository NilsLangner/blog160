<?php

namespace Mvc160\Model;

use Mvc160\Database\Database;

abstract class DatabaseModel
{
  private $database;
  
  public function __construct(Database $database)
  {
    $this->database = $database;
  }
  
  public function query($sqlQuery)
  {
    
    var_dump(get_class($this));
  }
  
  public function setVars($vars)
  {
    $this->vars = $vars;
  }
  
  public function getVars()
  {
    return $this->vars;
  }
}