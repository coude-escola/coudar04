<?php

namespace App\Api;
use Slim\Routing\RouteCollectorProxy as Group;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Main{
  public function main(Group $group){
    $group->get('[/]', Main::class . ':person');
  }

  public function person(Request $req, Response $res){
    $data = [
      "enterprise"      => 'Zerrai Mundo',
      "sector"     => 63,
      "email" => 'aposentado',
      "documentNumber"     => 'jazz anos 80',
    ];

    $res->getBody()->write(json_encode($data));

    return $res;
  }
}