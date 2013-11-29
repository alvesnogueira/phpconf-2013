<?php

namespace Codebase;

class Controller extends \stdClass {

  public function __construct( Array $injection ) {
    // Inject dependences on Controller
    foreach($injection as $attr => $object) {
      $this->$attr = $object;
    }
  }

}