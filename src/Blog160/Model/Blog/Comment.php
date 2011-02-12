<?php

namespace Blog160\Model\Blog;

use Mvc160\Model\DatabaseModel;

class Comment extends DatabaseModel
{
  protected $vars = array ();
  
  protected function getTableName( )
  {
    return 'comments';
  }
  
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

  public function setDate( $date )
  {
    $this->vars['date'] = $date;
  }
  
  public function setMessage( $message )
  {
    $this->vars['message'] = $message;
  }
  
  public function setBlogEntryId( $blogEntryId )
  {
    $this->vars['blog_entry_id'] = $blogEntryId;
  }
  
  public function getBlogEntryId( )
  {
    return $this->vars['blog_entry_id'];
  }
  
  public function getAllByBlogEntry( BlogEntry $blogEntry )
  {
    return $this->query('SELECT * FROM comments WHERE blog_entry_id = '.$blogEntry->getId().' ORDER BY id DESC' );
  }
}