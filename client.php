<?php
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$quest = 'O que será de mim API?';
$apiUrl = sprintf('http://localhost:5000/api?prompt=%s', $quest); // Substitua pela URL da API da Ollama
//$apiKey = 'YOUR_OLLAMA_API_KEY'; // Substitua pela sua chave de API da Ollama

// Fazer a requisição à API da Ollama
try {
    $apiResponse = $client->request('GET', $apiUrl);

    $apiResponseBody = $apiResponse->getBody()->getContents();
    $apiResponseData = json_decode($apiResponseBody, true);
   print_r($apiResponseData);

} catch (Exception $e) {
   var_dump($e->getMessage());
}

