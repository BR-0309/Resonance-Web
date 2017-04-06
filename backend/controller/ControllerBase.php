<?php

class ControllerBase
{

    public function index()
    {
        $this->error(1,"ErrorHandler not called right");
    }

    public function error($errorcode, $errormessage)
    {
        echo "Code: " . $errorcode . "<br>" . "Message: " . "<br>" . $errormessage;
    }

}
