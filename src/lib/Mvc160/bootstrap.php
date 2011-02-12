<?php

function Mvc160_autoload($class)
{
  $classPath = __DIR__ . '/../'. DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
  if (file_exists($classPath))
  {
    require_once $classPath;
  }
}

spl_autoload_register('Mvc160_autoload');