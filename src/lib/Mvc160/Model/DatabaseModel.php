<?php

namespace Mvc160\Model;

use Mvc160\Database\Database;

abstract class DatabaseModel
{
  private $database;
  
  protected $vars;
  
  public function __construct(Database $database)
  {
    $this->database = $database;
  }
  
  abstract protected function getTableName();
 
  public function getId()
  {
    return $this->vars ['id']; 
  }
  
  public function setId($id)
  {
    $this->vars ['id'] = $id;
  }
  
  protected function query($sqlQuery)
  {
    $rows = $this->database->query($sqlQuery);
    $result = array ();
    
    if (is_array($rows))
    {
      foreach ( $rows as $row )
      {
        $className = get_class($this);
        $model = new $className($this->database);
        $model->setVars($row);
        $result [] = $model;
      }
    }
    
    return $result;
  }
  
  public function store()
  {
    if (is_null($this->getId()))
    {
      foreach ( $this->vars as $key => $var )
      {
        $fields .= ', `' . mysql_escape_string($key) . '`';
        $values .= ", '" . mysql_escape_string($var) . "'";
      }
      $sqlQuery = "INSERT INTO  `" . $this->getTableName() . "` ( `id`" . $fields . ' ) VALUES ( NULL' . $values . ' );';
      $id = $this->database->insert($sqlQuery);
      $this->setId($id);
    }
    else
    {
      foreach ( $this->vars as $key => $var )
      {
        $update .= ", `$key` = '$var";
      }
      $sqlQuery = "UPDATE  `" . $this->getTableName() . "` SET  NULL $update WHERE  `id` = '" . $this->getId() . "';";
      $this->database->update($sqlQuery);
    }
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