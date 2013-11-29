<?php

// Diretório da aplicação
$app_folder = "aplicacao";

// Diretório do codebase
$core_folder = "codebase";

// Constantes
define( "DS" , DIRECTORY_SEPARATOR );
define( "EXT" , '.php' );
define( "EXT_VIEW" , '.html.php' );
define( "BASE_PATH", dirname(__FILE__) . DS );
define( "APP_PATH", BASE_PATH . $app_folder . DS );
define( "CODEBASE", BASE_PATH . $core_folder . DS );

// Inicializa o micro-framework
require CODEBASE . 'index.php';
