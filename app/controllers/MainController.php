<?php

require_once RELATIVE_PATH_MODELS . 'ApiModel.php';

class MainController
{
    private $pages;
    private $apiModel;

    public function __construct() {
        $this->pages = new League\Plates\Engine(RELATIVE_PATH_VIEWS);
        $this->apiModel = new ApiModel();
    }

    public function get_current_date()
    {
        $date= [];
        $date['day'] = date('d');
        $date['month'] = date('M');
        return $date;
    }

    public function render_home()
    {
        // Variable générale de stockage des données à transmettre aux vues
        $data = [];

        // Récupérer les données
        $nav = $this->apiModel->get_nav();
        $chatbot = $this->apiModel->get_chatbot_messages();

        // On les stocke dans la variable générale
        $data['nav'] = $nav;
        $data['chatbot'] = $chatbot;
        $data['current_date'] = $this->get_current_date();

        // Inclure la vue correspondante
        echo $this->pages->render(
            'home/home',
            [
                'title' => 'Accueil',
                'title_in_page' => 'Accueil',
                'data' => $data
            ]
        );
    }

    public function render_error()
    {
        // Inclure la vue correspondante
        echo $this->pages->render(
            'error/error',
            [
                'title' => 'Page introuvable',
                'title_in_page' => '404',
                'message' => 'Oops, une erreur s\'est produite.',
                'submessage' => 'Désolé, nous ne parvenons pas à trouver votre page.'
            ]
        );
    }

    public function get_token()
    {
        if (isset($_SESSION['token'])) {
            $response = ['token' => $_SESSION['token']];
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            echo json_encode(['error' => 'Token not found']);
        }
    }
}
