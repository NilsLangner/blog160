<?php

namespace Mvc160\Database;

class Database
{
  private $user;
  private $password;
  private $database;
  private $host;
  
  private $ressource;
  private $linkIdentifier;
  
  public function __construct($user, $password, $database, $host)
  {
    $this->user = $user;
    $this->password = $password;
    $this->database = $database;
    $this->host = $host;
    
    $this->connect();
  }
  
  private function connect()
  {
    $this->linkIdentifier = mysql_connect($this->host, $this->user, $this->password) or die("Keine Verbindung möglich: " . mysql_error());
    mysql_select_db($this->database, $this->linkIdentifier);
  }
  
  public function insert( $sqlQuery )
  {
     mysql_query($sqlQuery, $this->linkIdentifier);
     return mysql_insert_id();
  }
  
  public function update( $sqlQuery )
  {
    mysql_query($sqlQuery, $this->linkIdentifier);
    return mysql_affected_rows();
  }
  
  public function query($sqlQuery)
  {
    $result = mysql_query($sqlQuery, $this->linkIdentifier);
    
    while ( $row = mysql_fetch_array($result, MYSQL_ASSOC) )
    {
      $rows [] = $row;
    }
    
    return $rows;
  }
}