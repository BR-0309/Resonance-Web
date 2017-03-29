<?php

class DefaultController
{

    public function index()
    {
        echo '{
                "error": {
                    "code": 404,
                    "message": "Function not found"
                 }
              }';
    }

}
