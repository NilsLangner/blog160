<?php

namespace Mvc160\Route;

interface Route
{
  public function getModule( );
  public function getAction();
  public function getParameter();
  public function getApplicationName();
}