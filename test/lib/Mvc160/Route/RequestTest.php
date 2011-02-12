<?php

namespace Test\Mvc160\Route;

use Mvc160\Route\Request;

class RequestTest
{  
  /**
   * This function tests if a correct initialized Route returns the correct action, controller,
   * application name and parameters.
   */
  public function testGoodRequest( )
  {
    $parameter = (array('action' => 'myAction', 
                        'controller' => 'myController', 
                        'someParameter' => 'myParameter'));
    
    $request = new Request($parameter, 'TestName', '', '');
    
    $this->assertEquals( $request->getAction( ), 'myAction' );
    $this->assertEquals( $request->getControler( ), 'myController' );
    $this->assertEquals( $request->getApplicationName( ), 'TestName' );
    $this->assertEquals( $request->getParameter( ), $parameter );
  }
  
  /**
   * This function test if a route that is initialized without action and controller returns the
   * correc standard values.
   */
  public function testDefaultRequest( )
  {
    $parameter = (array('someParameter' => 'myParameter'));
    
    $request = new Request($parameter, 'TestName', 'myController', 'myAction');
    
    $this->assertEquals( $request->getAction( ), 'myAction' );
    $this->assertEquals( $request->getControler( ), 'myController' );
  }
}