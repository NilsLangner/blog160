<?php

namespace Mvc160\Controller;

use Mvc160\Database\Database;

/**
 * This interface is used to specify controllers. Each controller can contain as many 
 * action as needed. All actions are methods prefixed with action (e.g. actionIndex).
 * 
 * @author Nils Langner
 *
 */
interface Controller
{
  /**
   * The constructor is used to inject the database. Needed for better testing.
   * 
   * @param Database $database
   */
  public function __construct(Database  $database);
}