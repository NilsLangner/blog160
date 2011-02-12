<?php

namespace Mvc160\Model;

use Mvc160\Database\Database;

abstract class DatabaseModel
{
  /**
   * The database instance
   * 
   * @var Mvc160\Database\Database
   */
  private $database;
  
  /** 
   * The container for the database content
   * 
   * @var string[]
   */
  protected $vars = array();
  
  public function __construct(Database $database)
  {
    $this->database = $database;
  }
  
  /**
   * This function is used to return the database table for specific model
   * 
   * @return string
   */
  abstract protected function getTableName();
 
  /**
   * Returns the id of the entity
   */
  public function getId()
  {
    return $this->vars ['id']; 
  }
  
  /**
   * Sets the id of the entity
   * 
   * @param int $id
   */
  public function setId($id)
  {
    $this->vars ['id'] = $id;
  }
  
  /**
   * Fires a sql query and returns a result array of models
   * 
   * @param string $sqlQuery
   * @return Mvc160\Model\Model[]
   */
  protected function select($sqlQuery)
  {
    $rows = $this->database->select($sqlQuery);
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
  
  /**
   * Stores the model to the database
   */
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
  
  /**
   * Sets all values of the entity at once
   * 
   * @param array $vars
   */
  public function setVars(array $vars)
  {
    $this->vars = $vars;
  }
  
  /**
   * Returns an array with all values of this entity
   * @return array
   */
  public function getVars()
  {
    return $this->vars;
  }
}