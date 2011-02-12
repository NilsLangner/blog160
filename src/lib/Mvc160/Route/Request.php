<?php

namespace Mvc160\Route;

class Request implements Route
{
  private $request;
  
  private $action;
  private $controller;
  private $parameters = array ();
  
  private $applicationName = 'Mvc160';
  
  public function __construct($request, $applicationName, $standardController, $standardAction)
  {
    $this->applicationName = $applicationName;
    $this->controller = $standardController;
    $this->action = $standardAction;
    $this->request = $request;
    $this->init();
  }
  
  public function setStandardAction( )
  {
  }
  
  private function init()
  {
    if (array_key_exists('controller', $this->request))
    {
      $this->controller = $this->request ['controller'];
    }
    if (array_key_exists('action', $this->request))
    {
      $this->action = $this->request ['action'];
    }
    $this->parameters = $this->request;
  }

  public function getApplicationName( )
  {
    return $this->applicationName;
  }
  
  /**
   * 
   */
  public function getAction()
  {
    return $this->action;
  }
  
  /**
   * 
   */
  public function getController()
  {
    return $this->controller;
  }
  
  /**
   * 
   */
  public function getParameter()
  {
    return $this->parameters;
  }

}