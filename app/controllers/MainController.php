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

    public function github_webhook()
    {
        // save the payload in payload.log
        $payload = file_get_contents('php://input'); 
        $githubSignature = isset($_SERVER['HTTP_X_HUB_SIGNATURE']) ? $_SERVER['HTTP_X_HUB_SIGNATURE'] : '';

        // check if the secret is present in the .env file
        $secret = $_ENV['GITHUB_SECRET'];
        if(!$secret) { 
            write_log('tracking_deploy', 'Error', 'Le secret n\'est pas présent dans le fichier .env', 'red');
            echo "Le secret n'est pas présent dans le fichier .env";
            return;
        }

        $hash = hash_hmac('sha1', $payload, $secret); // generate the hash

        if (hash_equals('sha1=' . $hash, $githubSignature)) {
            // the signature is valid, continue
            $date = date('d/m/Y H:i:s');
            $data = $date . ' - ' . $payload;

            // save the payload in payload.log
            write_log('payload', 'Valid payload', $data, 'green');

            // check if the script is present in the auto folder
            if(!file_exists('./app/auto/autodeploy.sh')) {
                write_log('tracking_deploy', 'Error', 'Le script n\'est pas présent dans le dossier "auto"', 'red');
                echo "Le script n'est pas présent dans le dossier 'auto'";
                return;
            } else {
                write_log('tracking_deploy', 'Success', 'Le script est présent dans le dossier "auto"', 'green');

                // execute the script
                shell_exec('./app/auto/autodeploy.sh');
                write_log('tracking_deploy', 'Success', 'Le script a été exécuté', 'green');
            }

            // On récupère les données du dernier commit pour les enregistrer dans un fichier
            $payload = json_decode($payload, true);
            $lastcommit = $payload['head_commit']['id'] . ' - ' . $payload['head_commit']['message'];

            // add the data in tracking_deploy.log
            write_log('tracking_deploy', 'Success', $lastcommit, 'green');

            // On envoie un mail pour confirmer le déploiement
            $to = DEV_MAIL;
            $subject = "Valid - Déploiement du site";
            $message = "Le site a été déployé avec succès\n\nDernier commit: " . $lastcommit;
            $headers = "From: portfolio.deploy@porrini.tech" . "\r\n";
            
            mail($to, $subject, $message, $headers) ? write_log('mail', 'Mail sent', '(' . $date . '): ' . $lastcommit, 'green') : write_log('mail', 'Mail not sent', '(' . $date . '): ' . $lastcommit, 'red');
        } else { 
            // La signature n'est pas valide, rejeter la requête
            $date = date('d/m/Y H:i:s');
            $data = $date . ' - ' . $payload;
            write_log('payload', 'Unvalid payload', $data, 'red');

            // On récupère les données du dernier commit pour les enregistrer dans un fichier
            $payload = json_decode($payload, true);
            $lastcommit = $payload['head_commit']['id'] . ' - ' . $payload['head_commit']['message'];

            // add the data in tracking_deploy.log
            write_log('tracking_deploy', 'Error', $lastcommit, 'red');

            // On envoie un mail d'echec
            $to = DEV_MAIL;
            $subject = "Echec - Déploiement du site"; 
            $message = "Le site n\'a pu être déployé\n\nDernier commit: " . $lastcommit;
            $headers = "From: portfolio.deploy@porrini.tech" . "\r\n";
            
            mail($to, $subject, $message, $headers) ? write_log('mail', 'Mail sent', '(' . $date . '): ' . $lastcommit, 'green') : write_log('mail', 'Mail not sent', '(' . $date . '): ' . $lastcommit, 'red');
        }
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
        // global variable to store data
        $data = [];

        // get data from the API
        $nav = $this->apiModel->get_nav();
        $chatbot = $this->apiModel->get_chatbot_messages();

        // stock data in the global variable
        $data['nav'] = $nav;
        $data['chatbot'] = $chatbot;
        $data['current_date'] = $this->get_current_date();

        // send it to the view
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
        // send it to the view
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
