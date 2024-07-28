<?php
  session_start();
  
  require_once __DIR__ . '/../vendor/autoload.php';

  use Slim\Factory\AppFactory;
  use Psr\Http\Message\ResponseInterface as Response;
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Slim\Routing\RouteCollectorProxy as Group;

  use App\Controller\Web as ViewRoutes;
  use App\Api\Main as ApiRoutes;

  $app = AppFactory::create();

  $app->addRoutingMiddleware();
  $app->addBodyParsingMiddleware();
  $app->setBasePath('');

  $app->group('/', ViewRoutes::class . ':main');
  $app->group('/api', ApiRoutes::class . ':main');

  $app->addRoutingMiddleware();

  $errorMiddleware = $app->addErrorMiddleware(true, true, true);

  $app->run();