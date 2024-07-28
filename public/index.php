<?php
  session_start();
  
  require_once __DIR__ . '/../vendor/autoload.php';

  use Slim\Factory\AppFactory;
  use App\Controller\FormsCrontroller;
  use App\Middleware\JsonBodyParserMiddleware;

  $app = AppFactory::create();

  $app->addRoutingMiddleware();
  $app->addBodyParsingMiddleware();
  $app->setBasePath('');

  $app->post('/api/forms', FormsCrontroller::class .":forms")->add(new JsonBodyParserMiddleware());


  // $app->group('/api', ApiRoutes::class . ':main');

  $app->addRoutingMiddleware();

  $errorMiddleware = $app->addErrorMiddleware(true, true, true);

  $app->run();