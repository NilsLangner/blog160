<?php

// the bootstrap for the mvc160 framework
include_once '../lib/Mvc160/bootstrap.php';

/**
 * The autoload function for the Blog160 application
 * 
 * @param $class
 */
function Blog160_autoload($class)
{
  $classPath = __DIR__ . '/../'. DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
  if (file_exists($classPath))
  {
    require_once $classPath;
  }
}

spl_autoload_register('Blog160_autoload');