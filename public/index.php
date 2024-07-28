<?php
 session_start();
  
  require_once __DIR__ . '/../vendor/autoload.php';

  use Slim\Factory\AppFactory;


  use App\Controller\Web as ViewRoutes;
  use App\Api\Main as ApiRoutes;

  $app = AppFactory::create();

  $app->addRoutingMiddleware();
  $app->addBodyParsingMiddleware();
  $app->setBasePath('');

  //$app->group('/', ViewRoutes::class . ':main');
  $app->group('/api', ApiRoutes::class . ':main');

  $app->addRoutingMiddleware();

  $errorMiddleware = $app->addErrorMiddleware(true, true, true);

  $app->run();

 


 /*
  require_once __DIR__ . '/../vendor/autoload.php';

  use Psr\Http\Message\ResponseInterface as Response;
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Slim\Factory\AppFactory;
  use Slim\Routing\RouteCollectorProxy as Group;


  $app = AppFactory::create();


  $app->get('/ping',function( Request  $request, Response $response) {

    $response->getBody()->write("pong");

    return $response;
  });


  $app->group("/api", function(Group $group){
    $group->get('/ping',function( Request  $request, Response $response) {

      $response->getBody()->write("/api/pong");
  
      return $response;
    });

    $group->post('/ping',function( Request  $request, Response $response) {

      $response->getBody()->write("POST - /api/pong");
  
      return $response;
    });
  });

  $app->run();
   */