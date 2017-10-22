<?php
/**
 * Created by PhpStorm.
 * User: craigmcfarlane
 * Date: 2017-10-21
 * Time: 9:54 PM
 */

namespace classes;
require "NewsStory.php";

/**
 * this class takes the response from google and turns it into something prettier
 */
class NewsStoryArray
{
    protected $storyArray = array();

    /**
     * NewsResponse constructor.
     * @param $responseArray
     */
    public function __construct($responseArray)
    {

        foreach ($responseArray as $response)
        {

            $story = new NewsStory(
                $response->title,
                $response->link,
                $response->pagemap->metatags[0]->pubdate,
                $response->pagemap->metatags[0]->section);
            $this->addStory($story);
        }
    }

    /**
     * @return mixed
     */
    public function getStoryArray()
    {
        return $this->storyArray;
    }

    /**
     * @param mixed $storyArray
     */
    public function setStoryArray($storyArray)
    {
        $this->storyArray = $storyArray;
    }

    public function addStory($story)
    {
        array_push($this->storyArray, $story);
    }

    public function getStories()
    {
        foreach ($this->getStoryArray() as $item)
        {
            print $item->getTitle() . "\n";
            print $item->getUrl() . "\n\n";
        }
    }
}