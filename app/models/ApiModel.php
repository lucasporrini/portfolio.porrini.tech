<?php
class ApiModel
{
    private $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = "https://api.porrini.tech/";
    }

    public function api_call($url_slug, $token)
    {
       // Construction de l'url d'appel
       $url = $this->apiBaseUrl . $url_slug;

       // Initialisation de la session
       $curl = curl_init($url);

       // Configuration des options de transfert
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_HTTPHEADER,[
           'Content-Type: application/json',
           'Authorization: Bearer ' . $token
       ]);

       // Exécuter la requête
       $response = curl_exec($curl);

       // Fermer la session
       curl_close($curl);

       // Retourner les données
       return $response;
    }

    public function get_nav()
    {
        // Récupérer les données
        $nav = $this->api_call('get_nav', $_ENV['TOKEN']);

        $json = json_decode($nav, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            return json_encode(['error' => 'Erreur interne']);
        }

        // Retourner les données
        return $json;
    }

    public function get_chatbot_messages()
    {
       // Récupérer les données
        $chatbot_messages = $this->api_call('get_chatbot_messages', $_ENV['TOKEN']);
         
        $json = json_decode($chatbot_messages, JSON_UNESCAPED_UNICODE);
        if($json === false) {
            http_response_code(500);
            return json_encode(['error' => 'Erreur interne']);
        }

        // Retourner les données
        return $json;
    }
}