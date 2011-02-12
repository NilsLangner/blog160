<?php

namespace Mvc160\Route;

interface Route
{
  public function getController( );
  public function getAction();
  public function getParameter();
  public function getApplicationName();
}