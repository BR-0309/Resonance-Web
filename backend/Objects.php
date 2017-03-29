<?php

class story
{
    public $title;
    public $recorded;
    public $url;
    public $section;
    public $source;
    public $language;
    public $country;

    public function __construct($title, $recorded, $url, $section, $source, $language, $country)
    {
        $this->title = $title;
        $this->recorded = $recorded;
        $this->url = $url;
        $this->section = $section;
        $this->source = $source;
        $this->language = $language;
        $this->country = $country;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getRecorded()
    {
        return $this->recorded;
    }

    public function setRecorded($recorded)
    {
        $this->recorded = $recorded;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getSection()
    {
        return $this->section;
    }

    public function setSection($section)
    {
        $this->section = $section;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function setSource($source)
    {
        $this->source = $source;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }
}