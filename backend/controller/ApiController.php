<?php

class ApiController
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

    public function articles()
    {

    }

}
