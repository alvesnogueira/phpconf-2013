<?php

// Implementação da PSR-0 
require CODEBASE . 'SplClassLoader.php';

// Configuração de auto carregamento
require BASE_PATH . 'autoload.php';

// Configuração de Rotas
require BASE_PATH . 'routes.php';

// Instancia objeto da classe URL
$ObjectUrl = new Codebase\Url();

// Re-escreve rotas
$route = str_replace( $ObjectUrl->base(), '', $ObjectUrl->current() );
$routed_url = Codebase\Routes::route( $route );

// Define parametros da rota padrão executada

  // Valores na URL
  $segments = $ObjectUrl->segments($routed_url);

  // Controlador que deve ser carregado
  $CALLED_CONTROLLER        = $ObjectUrl->segment(0, $routed_url) ? $ObjectUrl->segment(0, $routed_url) : 'main';
  // Método que deve ser executado
  $CALLED_CONTROLLER_METHOD = $ObjectUrl->segment(1, $routed_url) ? $ObjectUrl->segment(1, $routed_url) : 'index';
  // Parametros que devem ser passados ao método
  $CONTROLLER_PARAMS        = array_slice($segments, 2);
  $FULL_CONTROLLER_NAME     = "Controllers\\".ucfirst($CALLED_CONTROLLER);

// Verifica se o controlador existe
if ( is_file(APP_PATH . 'controllers' . DS . $CALLED_CONTROLLER . EXT ) ) {

  // Configura dependencias
  $dependence_inject = array(
    'load' => new Codebase\Loader(),
    'url' => $ObjectUrl,
  );

  // Instancia o controlador
  $CONTROLLER = new $FULL_CONTROLLER_NAME( $dependence_inject );

  // Verifica se o método existe no controlador
  if ( method_exists($CONTROLLER, $CALLED_CONTROLLER_METHOD) ) {

    // Executa o método
    call_user_func_array( array( $CONTROLLER, $CALLED_CONTROLLER_METHOD ), $CONTROLLER_PARAMS );
    exit();
  }

}

// Exibe página de erro.
die('<h1>Página não encontrada!</h1>');