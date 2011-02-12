<?php

namespace Mvc160\Dispatcher;

use Mvc160\Route\Route;

class Dispatcher
{
  private $route;
  
  public function __construct(Route $route)
  {
    $this->route = $route;
  }
  
  public function render()
  {
    $moduleClassName = $this->getModuleClassName();
    $actionFunction = $this->getActionFunctioName();
    
    $module = new $moduleClassName();
    
    $module->$actionFunction($this->route->getParameter());
  }
  
  private function getActionFunctioName()
  {
    return 'action' . $this->route->getAction();
  }
  
  private function getModuleClassName()
  {
    return $this->route->getApplicationName() . '\\Modules\\' . $this->route->getModule() . '\\' . $this->route->getModule();
  }
}