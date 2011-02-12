<?php

namespace Mvc160\View;

/**
 * This view is used to answer ajax requests. It returns a json object that consists of 
 * two parts. The status (failed|success) and the html content. It is decorating a Html view.
 * 
 * @author Nils Langner
 *
 */
class Json implements View
{
  /**
   * The decorated HtmlView
   * @var Html
   */
  private $view;
  
  /**
   * The status
   * 
   * @var string
   */
  private $status;
  
  const STATUS_FAILED = 'failed';
  const STATUS_SUCCESS = 'success';
  
  /**
   * Decorating a html view.
   * 
   * @param Html $view
   * @param string $status
   */
  public function __construct(Html $view, $status)
  {
    $this->status = $status;
    $this->view = $view;
  }
  
    /**
   * Used to set the template base dir
   * 
   * @param string $baseDir
   */
  public function setTemplateBaseDir($baseDir)
  {
    return $this->view->setTemplateBaseDir($baseDir);
  }
  
   /**
   * Used to set the template
   * 
   * @param string $template
   */ 
  public function setTemplate($template)
  {
    return $this->view->setTemplate($template);
  }
  
  /**
   * Used to assign variables to the template
   * 
   * @param string $key
   * @param mixed $value
   */
  public function setVar($key, $value)
  {
    $this->setVar($key, $value);
  }
  
  /**
   * Renders the template and returns the content
   * 
   * @return string
   */
  public function getContent()
  {
    return json_encode(array ('status' => $this->status, 'html' => $this->view->getContent() ));
  }
}