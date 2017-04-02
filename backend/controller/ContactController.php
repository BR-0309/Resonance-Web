<?php
require_once 'repository/ContactRepository.php';
class ContactController {

    public function index() {
        if(isset($_POST['name'], $_POST['email'], $_POST['text'])) {
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $this->error('Invalid e-mail address');
            }
            if(strlen($_POST['name']) < 4) {
                $this->error('Name too short');
            }
            if(strlen($_POST['text']) < 20) {
                $this->error('Message too short');
            }
            $repo = new ContactRepository();
            $repo->create($_POST['name'], $_POST['email'], $_POST['text']);
            echo '{
                "sucess": {
                    "code": 200,
                    "message": "Message sent!"
                 }
              }';
              // TEMP
              header("Location: /pages#!/contact");
              exit();
        } else {
            $this->error('Missing parameters');
        }
    }

    private function error($message) {
        echo '{
                "error": {
                    "code": 400,
                    "message": "' . $message . '"
                 }
              }';
        //TEMP
        header("Location: /pages#!/contact");
        exit();
    }

}