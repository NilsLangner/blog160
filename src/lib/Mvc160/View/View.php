<?php

namespace Mvc160\View;

/**
 * Views are used to render templates. 
 * 
 * @author Nils Langner
 */
interface View
{ 
  /**
   * Used to set the base directory where to find the templates.
   * 
   * @param string $baseDir
   */
  public function setTemplateBaseDir($baseDir);
  
  /**
   * Used to set the template
   * 
   * @param string $template
   */
  public function setTemplate($template);
  
  /**
   * Sets a variable that can be used in the tempale
   * 
   * @param string $key
   * @param mixed $value
   */
  public function setVar($key, $value);
  
  /**
   * Renders the template and returns the content
   * 
   * @return string
   */
  public function getContent();
}