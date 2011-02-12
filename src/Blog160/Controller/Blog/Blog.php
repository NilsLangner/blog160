<?php

namespace Blog160\Controller\Blog;

use Blog160\Model\Blog\BlogEntry;

use Mvc160\Database\Database;

use Mvc160\View\View;

class Blog
{
  private $database;
  
  public function __construct(Database $database)
  {
    $this->database = $database;
  }
  
  public function actionAdd(View $view, $parameters)
  {
    var_dump($parameters);
  }
  
  public function actionShowAll(View $view, $parameters)
  {
    $view->setVar('test', 'ein test');
    
    $blogEntry = new BlogEntry($this->database);
    
    $blogEntries = $blogEntry->query('SELECT * FROM blog');
    
    return $view;
  }
}