<?php

namespace Controllers;

class Users extends \Codebase\Controller {

  public function edit( $nickname ) {

    $view_data = array(
      'user_name' => $nickname ,
    );

    $this->load->view('edit-user', $view_data);

  }

}