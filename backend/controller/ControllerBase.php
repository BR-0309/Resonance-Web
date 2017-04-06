<?php

class ControllerBase
{

    public function index()
    {
        $this->error(404, "Function not found");
    }

    public function error($errorcode, $errormessage)
    {
        echo '{		
                 "error": {
                     "code": {$errorcode] ,		
                     "message": "{$errormessage}"		
                  }		
               }';
    }

}
