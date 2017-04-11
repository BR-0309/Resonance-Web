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

    public static function returnMessage($code, $message)
    {
        echo "{	\"error\": { \"code\": {$code}, \"message\": \"{$message}\" } }";
        exit();
    }

}