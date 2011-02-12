<?php

namespace Mvc160\Route;

class Request implements Route
{
  private $request;
  
  private $action;
  private $module;
  private $parameters = array ();
  
  private $applicationName;
  
  public function __construct($request, $applicationName)
  {
    $this->applicationName = $applicationName;
    $this->request = $request;
    $this->init();
  }
  
  private function init()
  {
    if (array_key_exists('module', $this->request))
    {
      $this->module = $this->request ['module'];
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
  public function getModule()
  {
    return $this->module;
  }
  
  /**
   * 
   */
  public function getParameter()
  {
    return $this->parameters;
  }

}