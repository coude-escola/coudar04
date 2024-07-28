<?php

namespace App\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy as Group;

class Web{
  private $template = null;

  public function __construct() {
    $this->template = new Engine(TEMPLATES, 'php');
  }

  public function main(Group $group){
    $group->get('[/]', Web::class . ':helloWorld');
  }

  public function helloWorld(Request $req, Response $res){
    $content = $this->template->render('hello-world');

    $res->getBody()->write($content);

    return $res;
  }
}