<?php

class Util
{
    public static function arrayToJson($array)
    {
        $output = "[";
        foreach ($array as $value) {
            $encoded = json_encode($value, JSON_PRETTY_PRINT);
            if (strcmp($encoded, "") != 0) {
                $output = $output . $encoded . ",";
            }
        }
        if (Util::endsWith($output, ",")) {
            $output = substr($output, 0, strlen($output) - 1);
        }
        $output = $output . "]";
        return $output;
    }

    public static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
        return (substr($haystack, -$length) === $needle);
    }

    public static function allowsXFrame($url)
    {
        if (substr($url, 0, 7) === "http://") {
            return false;
        }
        file_get_contents($url);
        foreach ($http_response_header as $value) {
            if (strcmp($value, "X-Frame-Options: SAMEORIGIN") == 0 || strcmp($value, "X-Frame-Options: DENY") == 0) {
                return false;
            }
        }
        return true;
    }

    public static function returnMessage($code, $message)
    {
        echo "{	\"error\": { \"code\": {$code}, \"message\": \"{$message}\" } }";
        //exit();
    }

}