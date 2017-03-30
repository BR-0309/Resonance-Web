<?php

require_once 'lib/ConnectionHandler.php';
require_once 'Objects.php';
class ApiController
{

    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
        return (substr($haystack, -$length) === $needle);
    }


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
        $excludeLanguages = '(0)';
        $excludeCountries = '(0)';
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
        $connection = ConnectionHandler::getConnection();
        $excludeCountries = $connection->real_escape_string($excludeCountries);
        $excludeLanguages = $connection->real_escape_string($excludeLanguages);
        $time = $connection->real_escape_string($time);
        $return = array();


        $sql = "SELECT news_story.title AS title, news_story.recorded AS recorded, news_story.url AS news_url,
                section.name AS section_name, 
                source.name AS source_name,
                language.name AS language_name, country.name AS country_name FROM news_story 
                JOIN section ON section.id=section_id 
                JOIN source ON source.id=source_id 
                JOIN language ON language.id=language_id 
                JOIN country ON country.id=country_id
                WHERE language.id NOT IN $excludeLanguages AND
                country.id NOT IN $excludeCountries AND
                news_story.recorded >= NOW()-$time
                ORDER BY rand() LIMIT 0,$limit";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $story = new story($row['title'], $row['recorded'], $row['news_url'], $row['section_name'], $row['source_name'],
                    $row['language_name'], $row['country_name']);
                array_push($return, (array)$story);
            }
        }

        $output = "[";
        foreach ($return as $value) {
            $encoded = json_encode($value, JSON_PRETTY_PRINT);
            if (strcmp($encoded, "") != 0) {
                $output = $output . $encoded . ",";
            }
        }
        if (ApiController::endsWith($output, ",")) {
            $output = substr($output, 0, strlen($output) - 1);
        }
        $output = $output . "]";
        echo $output;
        $connection->close();

    }

}
