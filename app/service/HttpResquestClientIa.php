<?php 
namespace App\Service;
use GuzzleHttp\Client;

class HttpResquestClientIa {

    public static function getRelatorio(string $description): array {
    
        $client = new Client();
        $apiUrl = sprintf('http://localhost:5000/api?prompt=%s', "Baseado no texto a seguir proponha soluções viáveis para a problemática em questão através de sistemas da informação: " . $description); // Substitua pela URL da API da Ollama
        //$apiKey = 'YOUR_OLLAMA_API_KEY'; // Substitua pela sua chave de API da Ollama
    
        // Fazer a requisição à API da Ollama
        try {
            $apiResponse = $client->request('GET', $apiUrl);
    
            $apiResponseBody = $apiResponse->getBody()->getContents();
            $apiResponseData = json_decode($apiResponseBody, true);
            return (array)$apiResponseData;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    
        return [];
    
    }
}

?>