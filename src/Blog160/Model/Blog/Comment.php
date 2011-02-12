<?php

namespace Blog160\Model\Blog;

use Mvc160\Model\DatabaseModel;

/**
 * This model represents a comment. It is related to a blog entry.
 * 
 * @author Nils Langner
 */
class Comment extends DatabaseModel
{
  /**
   * This function returns the table where the comments are stored
   * 
   * @return string
   */
  protected function getTableName( )
  {
    return 'comments';
  }
  
  /**
   * Returns the date the comment was stored
   * 
   * @return string the date (format: Y-m-d H:i:s)
   */
  public function getDate()
  {
    return $this->vars ['date'];
  }
  
  /**
   * Returns the comment message
   * 
   * @return string
   */
  public function getMessage()
  {
    return $this->vars ['message'];
  }
  
  /**
   * Sets the date when a comment was created
   * 
   * @param string $date (format: Y-m-d H:i:s)
   */
  public function setDate( $date )
  {
    $this->vars['date'] = $date;
  }
  
  /**
   * Sets the comment message
   * 
   * @param string $message
   */
  public function setMessage( $message )
  {
    $this->vars['message'] = $message;
  }
  
  /**
   * Sets the id of the blog entry this comment depends on
   * 
   * @param int $blogEntryId
   */
  public function setBlogEntryId( $blogEntryId )
  {
    $this->vars['blog_entry_id'] = $blogEntryId;
  }
  
  /**
   * Returns the id of the  related blog entry model
   * 
   * @return int 
   */
  public function getBlogEntryId( )
  {
    return $this->vars['blog_entry_id'];
  }
  
  /**
   * Returns an array containing all CommentModels for a specific BlonEntry
   * 
   * @param BlogEntry $blogEntry
   * @return Comment[]
   */
  public function getAllByBlogEntry( BlogEntry $blogEntry )
  {
    return $this->select('SELECT * FROM comments WHERE blog_entry_id = '.$blogEntry->getId().' ORDER BY id DESC' );
  }
}