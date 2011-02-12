<?php

namespace Mvc160\View;

class Html implements View
{
  private $template;
  private $vars = array ();
  
  private $baseDir;
  
  public function setTemplateBaseDir($baseDir)
  {
    $this->baseDir = $baseDir;
  }
  
  public function setTemplate($template)
  {
    $this->template = $template;
  }
  
  public function setVar($key, $value)
  {
    $this->vars [$key] = $value;
  }
  
  public function getContent()
  {
    extract($this->vars);
    ob_start();
    require $this->baseDir.'/'.$this->template;
    $content = ob_get_contents();
    ob_clean();
    
    return $content;
  }
}