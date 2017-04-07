<?php

class ControllerBase
{

    public function index()
    {
        Util::returnMessage(404, "Action not found");
    }


}
