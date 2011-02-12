<?php

namespace Mvc160\View;

/**
 * This is the standard view. It is used to render html content.
 * 
 * @author Nils Langner
 *
 */
class Html implements View
{
  /**
   * The template.
   * 
   * @var string
   */
  private $template;
  
  /**
   * The assigned variables
   * 
   * @var array
   */
  private $vars = array ();
  
  /**
   * The template base dir
   * 
   * @var string
   */
  private $baseDir;
  
  /**
   * Used to set the template base dir
   * 
   * @param string $baseDir
   */
  public function setTemplateBaseDir($baseDir)
  {
    $this->baseDir = $baseDir;
  }
  
  /**
   * Used to set the template
   * 
   * @param string $template
   */
  public function setTemplate($template)
  {
    $this->template = $template;
  }
  
  /**
   * Used to assign variables to the template
   * 
   * @param string $key
   * @param mixed $value
   */
  public function setVar($key, $value)
  {
    $this->vars [$key] = $value;
  }
  
  /**
   * Renders the template and returns the content
   * 
   * @return string
   */
  public function getContent()
  {
    extract($this->vars);
    ob_start();
    require $this->baseDir . '/' . $this->template;
    $content = ob_get_contents();
    ob_clean();
    
    return $content;
  }
}