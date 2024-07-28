<?php 
namespace App\Service;

use Curl\Curl;

class HttpResquestClient {

    public static function getRelatorio(string $description): array {
    
        $client = new Curl();
    
        $client->setTimeout(320);
        $apiUrl = sprintf('http://localhost:5000/api', "Baseado no texto a seguir proponha soluções viáveis para a problemática em questão através de sistemas da informação: " . $description); // 
    
        // Fazer a requisição à API 
        try {
            $client->get($apiUrl, ["prompt" => $description ]);
            $apiResponseData = json_decode($client->response, true);
            var_dump($client);
            return (array)$apiResponseData;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

        return [];
    
    }

    public static function sendDataFormForCore(array $data): array {
    
        $client = new Curl();
        $apiUrl = sprintf('http://localhost:8000/api/form-core');
    
        try {
            $client->get($apiUrl, $data);
            $apiResponseData = json_decode($client->response, true);
            var_dump($apiResponseData);
            return (array)$apiResponseData;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

        return [];
    
    }
}

?>