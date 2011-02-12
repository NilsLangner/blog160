<?php

namespace Mvc160\Database;

class Database
{
  private $user;
  private $password;
  private $database;
  private $host;
  
  public function __construct( $user, $password, $database, $host )
  {
    $this->user = $user;
    $this->password = $password;
    $this->database = $database;
    $this->host = $host;
  }
  
  private function connect( )
  {
    $linkIdentifier  mysql_connect("localhost", "mysql_user", "mysql_password") or die("Keine Verbindung möglich: " . mysql_error());
    mysql_select_db("mydb");
  }
  
}