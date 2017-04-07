<?php
require_once 'repository/RepositoryContact.php';
require_once 'controller/ControllerBase.php';

class ControllerContact extends ControllerBase
{

    public function index()
    {
        if (isset($_POST['name'], $_POST['email'], $_POST['text'])) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                Util::returnMessage(400, "Invalid Email");
            }
            if (strlen($_POST['name']) < 4) {
                Util::returnMessage(400, 'Name too short');
            }
            if (strlen($_POST['text']) < 20) {
                Util::returnMessage(400, 'Message too short');
            }
            $repo = new ContactRepository();
            $repo->create($_POST['name'], $_POST['email'], $_POST['text']);
            Util::returnMessage(200, "Message sent");

            // TEMP
            header("Location: /pages#!/contact");
            exit();
        } else {
            Util::returnMessage(400, 'Missing parameters');
        }
    }

}