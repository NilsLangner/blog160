<?php

namespace Mvc160\View;

interface View
{ 
  public function setTemplateBaseDir($baseDir);
  
  public function setTemplate($template);
  
  public function setVar($key, $value);
  
  public function getContent();
}