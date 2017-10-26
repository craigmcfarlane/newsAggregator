<?php
/**
 * Created by PhpStorm.
 * User: craigmcfarlane
 * Date: 2017-10-21
 * Time: 11:07 PM
 */

namespace classes\tweets;

class Story
{
    protected $title;
    protected $url;
    protected $datePublished;

    /**
     * Story constructor.
     * @param $title
     * @param $url
     * @param $datePublished
     * @param $section
     */
    public function __construct($name, $url, $datePublished)
    {
        $this->name = $name;
        $this->url = $url;
        $this->datePublished = $datePublished;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * @param mixed $datePublished
     */
    public function setDatePublished($datePublished)
    {
        $this->datePublished = $datePublished;
    }

}