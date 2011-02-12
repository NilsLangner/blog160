<?php

namespace Mvc160\Route;

/**
 * This is a special route. It uses the php get and post parameters to specify the controller
 * and the action.
 * 
 * @author Nils Langner
 *
 */
class Request implements Route
{
  /**
   * The request.
   * 
   * @var string[]
   */
  private $request;
  
  /**
   * The action to be called
   * 
   * @var string
   */
  private $action;
  
  /**
   * The controller to be called
   * 
   * @var string
   */
  private $controller;
  
  /**
   * All additional parameters
   * 
   * @var string[]
   */
  private $parameters = array ();
  
  /**
   * The name of the application
   * 
   * @var string
   */
  private $applicationName = 'Mvc160';
  
  /**
   * @param array $request The request to be handled (e.g. $_REQUEST)
   * @param string $applicationName
   * @param string $standardController
   * @param string $standardAction
   */
  public function __construct($request, $applicationName, $standardController, $standardAction)
  {
    $this->applicationName = $applicationName;
    $this->controller = $standardController;
    $this->action = $standardAction;
    $this->request = $request;
    $this->init();
  }
  
  /**
   * This function calculates and sets the controller, action and parameters
   */
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

  /**
   * Returns he application name
   */
  public function getApplicationName( )
  {
    return $this->applicationName;
  }
  
  /**
   * Returns the action that was calculated using the request
   * 
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  
  /**
   * Returns the controller that was caluclated using the request
   * 
   * @return $string
   */
  public function getController()
  {
    return $this->controller;
  }
  
  /**
   * Returns all parameters for this request
   */
  public function getParameter()
  {
    return $this->parameters;
  }

}