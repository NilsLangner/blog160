<?php

namespace Mvc160\Database;

/**
 * The database abstraction. This is a very simple class to handle database queries. In a live 
 * system Doctrine2 should be considered to use.
 * 
 * @todo Add error handling for connection errors
 * @todo Add error handling for mysql errors when sending a query
 * @fixme There must be an interface for the datababse abstraction. Only this way it is possible to mock the database.  
 *
 * @author Nils Langner
 */
class Database
{ 
  /**
   * The database connection link identifier
   * 
   * @var resource
   */
  private $linkIdentifier;
  
  /**
   * Connect to the database server
   * 
   * @param string $user
   * @param string $password
   * @param string $database
   * @param string $host
   */
  public function __construct($user, $password, $database, $host)
  {
    $this->connect($user, $password, $database, $host);
  }
  
  /**
   * This function connects to the database. All connection parameters are deleted after use because
   * of security issues.
   * 
   * @param string $user
   * @param string $password
   * @param string $database
   * @param string $host
   */
  private function connect($user, $password, $database, $host)
  {
    $this->linkIdentifier = mysql_connect($host, $user, $password) or die("Keine Verbindung m�glich: " . mysql_error());
    mysql_select_db($database, $this->linkIdentifier);
  }
  
  /**
   * Use this function to fire insert statements agains the database
   * 
   * @param string $sqlQuery
   * @return int the id of this object
   */
  public function insert( $sqlQuery )
  {
     mysql_query($sqlQuery, $this->linkIdentifier);
     return mysql_insert_id();
  }
  
  /**
   * Use this function to fire an update statement against the database
   * 
   * @param string $sqlQuery
   * @return int affected rows
   */
  public function update( $sqlQuery )
  {
    mysql_query($sqlQuery, $this->linkIdentifier);
    return mysql_affected_rows();
  }
  
  /**
   * Use this function to fire a select statement against the database
   * 
   * @param string $sqlQuery
   * @return array 
   */
  public function select($sqlQuery)
  {
    $result = mysql_query($sqlQuery, $this->linkIdentifier);
    
    $rows = array( );
    
    while ( $row = mysql_fetch_array($result, MYSQL_ASSOC) )
    {
      $rows [] = $row;
    }
    
    return $rows;
  }
}