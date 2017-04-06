<?php
require_once 'repository/ContactRepository.php';
require_once 'controller/ControllerBase.php';

class ContactController extends ControllerBase
{

    public function index()
    {
        if (isset($_POST['name'], $_POST['email'], $_POST['text'])) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $this->error(400, "Invalid Email");
            }
            if (strlen($_POST['name']) < 4) {
                $this->error(400, 'Name too short');
            }
            if (strlen($_POST['text']) < 20) {
                $this->error(400, 'Message too short');
            }
            $repo = new ContactRepository();
            $repo->create($_POST['name'], $_POST['email'], $_POST['text']);
            $this->error(200, "Message sent");

            // TEMP
            header("Location: /pages#!/contact");
            exit();
        } else {
            $this->error(2, 'Missing parameters');
        }
    }

}