<?php

require_once 'lib/ConnectionHandler.php';
require_once 'Story.php';
require_once 'repository/RepositoryArticle.php';
require_once 'controller/ControllerBase.php';

class ControllerApi extends ControllerBase
{

    public function articles()
    {
        $langs = '(1,2,3,4,5,6,7,8,9)'; // TEMP
        $countries = '(1,2,3,4,5,6,7,8,9)'; // TEMP
        $limit = 20;
        $time = 3600; // 1 hour

        if (isset($_GET['limit']) && is_int((int)$_GET['limit']) && $_GET['limit'] > 0) {
            $limit = $_GET['limit'];
        }

        if (isset($_GET['time']) && is_int((int)$_GET['time'])) {
            if ($_GET['time'] <= 0) {
                $time = 'NOW()'; // For all time
            } else {
                $time = (int)$_GET['time'];
            }
        }
        if ($limit > 50) {
            $limit = 50;
        }
        if (isset($_GET['langs']) && preg_match('^(\d+(,\d+)*)?$', $_GET['langs'])) {
            // TODO
        }
        $repo = new RepositoryArticle();
        echo $repo->getArticlesAsJson($langs, $countries, $time, $limit);
    }


}
