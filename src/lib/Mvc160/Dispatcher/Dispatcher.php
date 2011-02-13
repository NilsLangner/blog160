<?php

namespace Mvc160\Dispatcher;

use Mvc160\View\Html;
use Mvc160\Route\Route;
use Mvc160\Database\Database;

class Dispatcher
{
  /**
   * The route object.
   * 
   * @var Mvc160\Route\Route
   */
  private $route;
  
  /**
   * Where to find the application.
   * 
   * @var string
   */
  private $applicationRootDir;
  
  /**
   * The database object.
   * 
   * @var Mvc160\Database\Database
   */
  private $database;
  
  /**
   * @param Route $route
   * @param Database $database
   * @param string $applicationRootDir
   */
  public function __construct(Route $route, Database $database, $applicationRootDir)
  {
    $this->route = $route;
    $this->database = $database;
    $this->applicationRootDir = $applicationRootDir;
  }
  
  /**
   * This function returns the rendered webpage.
   * 
   * @todo improve error handling
   * 
   * @return string the complete webpage
   */
  public function render()
  {
    $moduleClassName = $this->getControllerClassName();
    $actionFunction = $this->getActionFunctioName();
    
    $module = new $moduleClassName($this->database);
    
    $view = new Html();
    $view->setTemplateBaseDir($this->getTemplateBaseDir());
    $view->setTemplate($this->getTemplate());
    $processedView = $module->$actionFunction($view, $this->route->getParameter());
    
    return $processedView->getContent();
  }
  
  /**
   * Returns the standard template for the controller|action
   * 
   * @return string
   */
  private function getTemplate()
  {
    return $this->route->getController().'/'.$this->route->getAction().'.php';
  }
  
  /**
   * Returns the tempale base dir for the application
   * 
   * @return string
   */
  private function getTemplateBaseDir()
  {
    return $this->applicationRootDir.'View';
  }
  
  /**
   * Returns the action function name to be called when rendering.
   * 
   * @return string
   */
  private function getActionFunctioName()
  {
    return 'action' . $this->route->getAction();
  }
  
  /**
   * Returns the controller where the action should be called.
   * 
   * @return string
   */
  private function getControllerClassName()
  {
    return $this->route->getApplicationName() . '\\Controller\\' . $this->route->getController() . '\\' . 
    $this->route->getController();
  }
}