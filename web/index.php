<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});

$app->get('/login', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return('Estamos construyendo una pagina de login ');
});

$app->get('/consulta', function() use($app) {
     $Conexion = pg_pconnect("host=ec2-54-225-228-142.compute-1.amazonaws.com port=5432 dbname=d776m8igghqlip user=lhqojhgduudqob password=ae4ebf1d3631252fbdc6538002d39431d4bb47d9570c35eb5b53d704ab3cf913");
   return $conexion;


});
$app-> run();