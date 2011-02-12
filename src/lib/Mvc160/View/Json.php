<?php

namespace Mvc160\View;

class Json implements View
{
  private $view;
  private $status;
  
  const STATUS_FAILED = 'failed';
  const STATUS_SUCCESS = 'success';
  
  public function __construct(Html $view, $status)
  { 
    $this->status = $status;
    $this->view = $view;
  }
  
  public function setTemplateBaseDir($baseDir)
  {
    return $this->view->setTemplateBaseDir($baseDir);
  }
  
  public function setTemplate($template)
  {
    return $this->view->setTemplate($template);
  }
  
  public function setVar($key, $value)
  {
    $this->setVar($key, $value);
  }
  
  public function getContent()
  {
    return json_encode(array ('status' => $this->status, 'html' => $this->view->getContent() ));
  }
}