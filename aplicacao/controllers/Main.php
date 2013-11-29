<?php

namespace Controllers;

class Main extends \Codebase\Controller {

  public function index() {

    $view_data = array(
      'title' => 'PHP CONF 2013'
    );

    $this->load->view('teste', $view_data);
  }

}