<?php

require_once 'lib/ConnectionHandler.php';
require_once 'Objects.php';
require_once 'repository/RepositoryArticle.php';
class ControllerApi
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
        $langs = '(1,2,3,4,5,6,7,8,9)';
        $countries = '(1,2,3,4,5,6,7,8,9)';
        $limit = 20;
        $time = 'NOW()';

        if (isset($_GET['limit']) && is_int((int)$_GET['limit']) && $_GET['limit'] > 0) {
            $limit = $_GET['limit'];
        }

        if (isset($_GET['time']) && is_int((int)$_GET['time'])) {
            if ($_GET['time'] <= 0) {
                $time = 'NOW()';
            } else {
                $time = $_GET['time'];
            }
        }
        if (isset($_GET['langs']) && preg_match('^(\d+(,\d+)*)?$', $_GET['langs'])) {
            // TODO
        }
        $repo = new RepositoryArticle();
        echo $repo->getArticlesAsJson($langs, $countries, $time, $limit);
    }

}
