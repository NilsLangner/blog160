<?php

namespace Blog160\Controller\Blog;

use Blog160\Model\Blog\Comment;
use Blog160\Model\Blog\BlogEntry;

use Mvc160\Database\Database;
use Mvc160\Controller\Controller;
use Mvc160\View\View;

/**
 * This controller is used to handle blog entries and comments
 * 
 * @author Nils Langner
 */

class Blog implements Controller
{
  /**
   * The injected database
   * 
   * @var Mvc160\Database\Database
   */
  private $database;
  
  public function __construct(Database $database)
  {
    $this->database = $database;
  }
  
  /**
   * This action is used to create a new comment for a specified blog entry
   * 
   * @param View $view
   * @param string[] $parameters
   */
  public function actionAddComment(View $view, $parameters)
  {
    if (array_key_exists('message', $parameters) 
        && strlen($parameters ['message']) > 0
        && strlen($parameters ['message']) <= 160)
    {
      $comment = new Comment($this->database);
      $comment->setMessage( $parameters['message']);
      $comment->setBlogEntryId($parameters['blog_entry_id']); 
      $comment->setDate(date('Y-m-d H:i:s'));    
      $comment->store();
    }
    else
    {
      $view->setTemplate('Blog\AddCommentFailure.php');
    }
    return $view;
  }
  
  /**
   * This function is used to add a new blog entry
   * 
   * @param View $view
   * @param string{] $parameters
   */
  public function actionAddEntry(View $view, $parameters)
  {
    if (array_key_exists('message', $parameters) 
        && strlen($parameters ['message']) > 0
        && strlen($parameters ['message']) <= 160)
    {
      $blogEntry = new BlogEntry($this->database);
      $blogEntry->setMessage($parameters ['message']);
      $blogEntry->setDate(date('Y-m-d H:i:s'));
      $blogEntry->store();
      $view->setVar('blogEntry', $blogEntry);
    }
    else
    {
      $view->setTemplate('Blog\AddEntryFailure.php');
    }
    
    return $view;
  }
  
  /**
   * This action shows all blog entries and the depending comment
   * 
   * @param View $view
   * @param array $parameters
   */
  public function actionShowAll(View $view, array $parameters)
  {
    $blogEntry = new BlogEntry($this->database);
    $blogEntries = $blogEntry->getAll();
    $view->setVar('blogEntries', $blogEntries);
    
    $commentEntry = new Comment($this->database);
    $comments = array ();
    foreach ( $blogEntries as $blogEntry )
    {
      $comments [$blogEntry->getId()] = $commentEntry->getAllByBlogEntry($blogEntry);
    }
    
    $view->setVar('comments', $comments);
    
    return $view;
  }
}