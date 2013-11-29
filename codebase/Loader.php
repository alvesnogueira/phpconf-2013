<?php

namespace Codebase;

class Loader {

  private $output_string = "";

  public function view ( $view, $data = array(), $output = false ) {
    ob_start();
    if ( is_array($data) ) { extract($data); }

    include APP_PATH . 'views' . DS . $view . EXT_VIEW;

    $content =  ob_get_clean();

    if ( $output ) {
      return $content;
    } else {
      $this->output_string = $content;
      return false;
    }
  }

  private function output() {
    echo $this->output_string;
  }

  public function __destruct() {
    $this->output();
  }

}