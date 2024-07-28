<?php

namespace App\Api;


use Slim\Routing\RouteCollectorProxy as Group;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Empresa{
  public function main(Group $group){

    $group->get('[/]', Empresa::class . ':create');
    $group->get('/find', Empresa::class . ':find');
    
  }

  public function create(Request $req, Response $res){
    $data = [
      "nome"      => 'Nike',
      "reresentante"     => 'Luiz 43123123132',
    ];

    $res->getBody()->write(json_encode($data));

    return $res;
  }

  public function find(Request $req, Response $res){
    $data = [
      'id' => 1,
      "nome"      => 'Nike',
      "reresentante"     => 'Luiz 43123123132',
    ];

    $res->getBody()->write(json_encode($data));

    return $res;
  }

  
}