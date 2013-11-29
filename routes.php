<?php

$routes = array(
  'php-conf-2013' => 'main/index' ,
  '(:alnum)/editar-perfil' => 'users/edit/$1' ,
  'schedule/grid-day(:num)' => 'users/edit/$1' ,
);

Codebase\Routes::config( $routes );