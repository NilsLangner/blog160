<?php

namespace Blog160\Model\Blog;

use Mvc160\Model\DatabaseModel;
use Mvc160\Database\Database;

/**
 * This model represents the database blog entry entity
 * 
 * @author Nils Langner
 */
class BlogEntry extends DatabaseModel
{
  /**
   * This function returns the table where the blog entries are stored
   * 
   * @return string
   */
  protected function getTableName( )
  {
    return 'blog_entries';
  }
  
  public function __construct(Database $database)
  {
    parent::__construct($database);
  }

  /**
   * Returns the date the blog entry was created
   * 
   * @return string
   */
  public function getDate()
  {
    return $this->vars ['date'];
  }
  
  /**
   * Returns the message of the blog entry
   * 
   * @return string
   */
  public function getMessage()
  {
    return $this->vars ['message'];
  }
  
  /**
   * Set the message for this blog entry
   * 
   * @param string $message
   */
  public function setMessage($message)
  {
    $this->vars ['message'] = $message;
  }
  
  /**
   * Sets the date when a blog entry was created
   * 
   * @param string $date date (format: Y-m-d H:i:s) 
   */
  public function setDate($date)
  {
    $this->vars ['date'] = $date;
  }
  
  /**
   * Returns an array of all BlogEntrie
   * 
   *  @return BlogEntry[] 
   */
  public function getAll()
  {
    return $this->select('SELECT * FROM blog_entries ORDER BY id DESC');
  }
}