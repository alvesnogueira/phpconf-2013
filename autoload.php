<?php 

// Auto-load de classes do projeto
$codebaseLoader = new SplClassLoader('Codebase', BASE_PATH );
$codebaseLoader->register();

// Auto-load para controladores
$controllerLoader = new SplClassLoader( 'Controllers', APP_PATH );
$controllerLoader->register();

// Auto-load para modelos
$modelLoader = new SplClassLoader( 'Model', APP_PATH );
$modelLoader->register();