<?php

namespace App\Api;
use Slim\Routing\RouteCollectorProxy as Group;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Main{
  public function main(Group $group){

    $group->get('[/]', Main::class . ':person');

    
    $group->group('/empresa', Empresa::class . ':main');

  }

  public function person(Request $req, Response $res){
    $data = [
      "nome"      => 'Zerrai Mundo',
      "idade"     => 63,
      "profissao" => 'aposentado',
      "hobby"     => 'jazz anos 80',
    ];

    $res->getBody()->write(json_encode($data));

    return $res;
  }

  
}