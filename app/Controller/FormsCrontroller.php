<?php 
namespace App\Controller;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Service\httpResquestClientIa;


class FormsCrontroller {
    
    public function forms (Request $request, Response $response){
       
        $parsedBody = $request->getParsedBody();

        // Validar dados vindos do formulário

        $description = $parsedBody['description']; 
        $responseApiIa = httpResquestClientIa::getRelatorio($description);
        if(isset($responseApiIa)){
            $parsedBody['responseApiIa'] = $responseApiIa;
            //Chamar API externa para salvar informações recebidas no BD
            $response->getBody()->write(json_encode($parsedBody));
        } else {
            $response = $response->withStatus(500);
            $response->getBody()->write(json_encode(["erro" => "Falha ao buscar relatório da IA"]));

        }

        return $response->withHeader("Conttent-Type", "application/json");

    }
}


?>