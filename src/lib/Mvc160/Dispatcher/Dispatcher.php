<?php

namespace Mvc160\Dispatcher;

use Mvc160\View\Html;
use Mvc160\Route\Route;
use Mvc160\Database\Database;

class Dispatcher
{
  private $route;
  private $applicationRootDir;
  
  private $database;
  
  public function __construct(Route $route, Database $database, $applicationRootDir)
  {
    $this->route = $route;
    $this->database = $database;
    $this->applicationRootDir = $applicationRootDir;
  }
  
  public function render()
  {
    $moduleClassName = $this->getControllerClassName();
    $actionFunction = $this->getActionFunctioName();
    
    $module = new $moduleClassName($this->database);
    
    $view = new Html();
    $view->setTemplateBaseDir($this->getTemplateBaseDir());
    $view->setTemplate($this->getTemplate());
    $processedView = $module->$actionFunction($view, $this->route->getParameter());
    
    echo $processedView->getContent();
  }
  
  private function getTemplate()
  {
    return $this->route->getController().'/'.$this->route->getAction().'.php';
  }
  
  private function getTemplateBaseDir()
  {
    return $this->applicationRootDir.'/View/';
  }
  
  private function getActionFunctioName()
  {
    return 'action' . $this->route->getAction();
  }
  
  private function getControllerClassName()
  {
    return $this->route->getApplicationName() . '\\Controller\\' . $this->route->getController() . '\\' . 
    $this->route->getController();
  }
}