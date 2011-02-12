<?php

namespace Mvc160\Controller;

use Mvc160\Database\Database;

interface Controller
{
  public function __construct(Database  $database);
}