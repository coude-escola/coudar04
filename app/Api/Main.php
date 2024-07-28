<?php

namespace App\Api;
use App\Middleware\JsonBodyParserMiddleware;
use Slim\Routing\RouteCollectorProxy as Group;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Main{
  public function main(Group $group){

    $group->post('[/]', Main::class . ':coleta')->add(new JsonBodyParserMiddleware);


  }

  public function coleta(Request $req, Response $res){


    $res->getBody()->write(json_encode(["mensagem" => "Dados Recebidos"]));

    return $res->withHeader("Content-Type","application/json");
  }

  
}