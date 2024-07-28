<?php
namespace App\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy as Group;

class Web {
  private $template = null;

  public function __construct() {
    $this->template = new Engine(TEMPLATES, 'php');
  }

  public function main(Group $group) {
    $group->get('[/]', Web::class . ':helloWorld');
    $group->post('/submit-form', Web::class . ':submitForm');
  }

  public function helloWorld(Request $req, Response $res) {
    $content = $this->template->render('hello-world');
    $res->getBody()->write($content);
    return $res;
  }

  public function submitForm(Request $req, Response $res) {
    // Extraindo dados do formulário
    $data = $req->getParsedBody();
    $enterprise = $data['enterprise'] ?? '';
    $sector = $data['sector'] ?? '';
    $email = $data['email'] ?? '';
    $documentNumber = $data['documentNumber'] ?? '';
    $description = $data['description'] ?? '';
    $zipcode = $data['zipcode'] ?? '';
    $category = $data['category'] ?? '';
    $constancy = $data['constancy'] ?? '';
    $sectorsImpacted = $data['sectorsImpacted'] ?? '';

    // Aqui você pode processar os dados conforme necessário, por exemplo, salvar no banco de dados

    // Renderizando uma resposta simples (pode ser substituído por renderização de template ou outra lógica)
    $res->getBody()->write('Form submission received successfully');
    return $res;
  }
}