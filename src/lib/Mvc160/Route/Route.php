<?php

namespace Mvc160\Route;

/**
 * Routes are used the map a specified url to a pair of controller, actions and parameters.
 *  
 * @author Nils Langner
 */
interface Route
{
  /**
   * This function returns the controller name
   * 
   * @return string controller name
   */
  public function getController( );
  
  /**
   * Returns the action name
   * 
   * @return string action name
   */
  public function getAction();
  
  /**
   * Returns an array with all parameters 
   * 
   * @return array
   */
  public function getParameter();
  
  /**
   * Returns the name of the application
   * 
   * @return string
   */
  public function getApplicationName();
}