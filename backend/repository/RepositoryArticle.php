<?php
require_once 'lib/Repository.php';
require_once 'StringUtil.php';

class RepositoryArticle extends Repository
{
    protected $tableName = 'news_story';


    public function getArticlesAsJson($languages, $countries, $time, $limit)
    {
        $connection = ConnectionHandler::getConnection();
        $languages = $connection->escape_string($languages);
        $countries = $connection->escape_string($countries);
        $time = $connection->escape_string($time);
        $sql = "SELECT news_story.title AS title, news_story.recorded AS recorded, news_story.url AS news_url,
                section.name AS section_name,
                source.name AS source_name,
                language.name AS language_name, country.name AS country_name FROM $this->tableName
                JOIN section ON section.id=section_id
                JOIN source ON source.id=source_id
                JOIN language ON language.id=language_id
                JOIN country ON country.id=country_id
                WHERE language.id IN $languages AND
                country.id IN $countries AND
                news_story.recorded >= NOW()-$time
                ORDER BY rand() LIMIT 0, $limit";
        $result = $connection->query($sql);
        $return = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $story = new story($row['title'], $row['recorded'], $row['news_url'], $row['section_name'], $row['source_name'],
                    $row['language_name'], $row['country_name']);
                array_push($return, (array)$story);
            }
        }

        return StringUtil::arrayToJson($return);
    }

}
